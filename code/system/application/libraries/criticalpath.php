<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Criticalpath
{
	function Criticalpath(){}
	private function preprocess(&$case)
	{
		$case['tasks'][0]['taskid']=0;
		$case['tasks'][0]['isparent']=1;
		$case['tasks'][0]['earlystart']=0;
		$tmp = array();
		foreach($case['tasks'] as $task){
			$taskid=$task['taskid'];
			$case['tasks'][$taskid]['indegree']=$case['tasks'][$taskid]['outdegree']=0;
		}
		foreach($case['tasks'] as $task){
			if($task['taskid']==0)
				continue;
			$taskid=$task['taskid'];
			if(preg_match("/\./",$task['wbs'],$match)){
				$pwbs=substr($task['wbs'],0,count($task['wbs'])-count($match)-2);
				$parentid=array_search($pwbs,$tmp);
				$case['tasks'][$taskid]['parentid']=$parentid;
				$case['tasks'][$parentid]['childrenids'][]=$taskid;
			}else{
				$case['tasks'][0]['childrenids'][]=$taskid;
			}
			$tmp[$taskid]=$task['wbs'];
			if(isset($task['predecessorids'])){
				$case['tasks'][$taskid]['predecessorids']= explode(",",$task['predecessorids']);
	
				foreach($case['tasks'][$taskid]['predecessorids'] as $row){
					//如果前驱为自己的孩子，则忽略
	//				if(!isset($task['childrenids']) || !in_array($row,$task['childrenids'])){
						$case['tasks'][$row]['successorids'][] = $taskid;
						$case['tasks'][$row]['outdegree']++;
						$case['tasks'][$taskid]['indegree']++;
	//				}
				}
			}
	
		}
	}
	
	
	
	//从前往后遍历，计算earlystart、earlyfinish和duration
	private function previsit(&$case,$taskid)
	{
		if(!isset($case['tasks'][$taskid]['isparent'])||$case['tasks'][$taskid]['isparent']==0){	
			$case['tasks'][$taskid]['earlyfinish'] = $case['tasks'][$taskid]['earlystart'] + $case['tasks'][$taskid]['duration'];
		}else{
			$childrens=$case['tasks'][$taskid]['childrenids'];
			$queue=array();//入度为0的队列
			foreach($childrens as $child){			
				if($case['tasks'][$child]['indegree']==0 ){
					$childid=$case['tasks'][$child]['taskid'];
					array_push($queue,$childid);
					$case['tasks'][$childid]['earlystart']=$case['tasks'][$taskid]['earlystart'];
				}
			}
			$max=array();//保存每个任务的earlyfinish
			while(!empty($queue)){
				$childid=array_shift($queue);
				if(isset($case['tasks'][$childid]['maxef']))
					$case['tasks'][$childid]['earlystart']=max($case['tasks'][$childid]['maxef']);	
				$tmp=$this->previsit($case,$childid);
				$max[]=$tmp;
				
				//所有后继入度-1
				if(!empty($case['tasks'][$childid]['successorids'])){
					foreach($case['tasks'][$childid]['successorids'] as $row){
						$case['tasks'][$row]['maxef'][]=$tmp;
						if(--$case['tasks'][$row]['indegree']==0)
							array_push($queue,$row); 
					}
				}
			}
			$case['tasks'][$taskid]['earlyfinish']=max($max);
			if(empty($max))
			{
				echo "visit $taskid\n";
			}
			$case['tasks'][$taskid]['duration']=$case['tasks'][$childid]['earlyfinish']-$case['tasks'][$taskid]['earlystart'];
		}
		return $case['tasks'][$taskid]['earlyfinish'];			
	}
	
	
	//从后往前遍历，计算latestart、latefinish
	private function postvisit(&$case,$taskid)
	{
		if(!empty($case['tasks'][$taskid]['minls'])){
			$case['tasks'][$taskid]['latefinish']=min($case['tasks'][$taskid]['minls']);
			$case['tasks'][$taskid]['latestart']=$case['tasks'][$taskid]['latefinish']-$case['tasks'][$taskid]['duration'];
		}else{
			$case['tasks'][$taskid]['latefinish']=$case['tasks'][$taskid]['earlyfinish'];
			$case['tasks'][$taskid]['latestart']=$case['tasks'][$taskid]['earlystart'];
		}
		if(isset($case['tasks'][$taskid]['isparent'])&&$case['tasks'][$taskid]['isparent']==1){
			$childrens=$case['tasks'][$taskid]['childrenids'];
			$queue=array();//出度为0的队列
			foreach($childrens as $child){
				if($case['tasks'][$child]['outdegree']==0 ){
					$childid=$case['tasks'][$child]['taskid'];
					array_push($queue,$childid);
				}
			}		
	
			while(!empty($queue)){
				$childid=array_shift($queue);
	
				$this->postvisit($case,$childid);
				//所有前驱出度-1
				if(!empty($case['tasks'][$childid]['predecessorids'])){
					foreach($case['tasks'][$childid]['predecessorids'] as $row){
						$case['tasks'][$row]['minls'][]=$case['tasks'][$childid]['latestart'];
						--$case['tasks'][$row]['outdegree'];
						if($case['tasks'][$row]['outdegree']==0)
							array_push($queue,$row); 
					}
				}
			}
		}
		if($case['tasks'][$taskid]['latefinish']==$case['tasks'][$taskid]['earlyfinish'])
			$case['tasks'][$taskid]['iscritical']=1;
		else
			$case['tasks'][$taskid]['iscritical']=0;

		
	}
	function critical(&$case)
	{
		$this->preprocess($case);
		$this->previsit($case,0);
		$this->postvisit($case,0);
	}

}