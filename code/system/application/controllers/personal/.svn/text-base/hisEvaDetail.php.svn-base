<?php
class HisEvaDetail extends Controller{
	function HisEvaDetail(){
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('evaluationmodel');
		$this->load->model('task_model');
		$this->load->model('xmlmodel');
		$this->load->helper('html');
	}
	
	private function isLoggedIn(){
		$user_name = $this->session->userdata('user_name');
		return empty($user_name)?FALSE:TRUE;
		}
	
	function index(){
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin'); 
			$this->loadviews();
		}
		else{
			$this->show();
		}
	}   
	
	private function show(){
   	    $insId = $this->input->post('insId'); 
        $userId = $this->session->userdata('user_id');
        
        $scores=$this->evaluationmodel->getHistoryScore($userId,$insId);
        $i=0;
        $j=0;
        $averageScore=array();
        $taskNames=array();
        $taskId=array();
        	if(is_array($scores)){
        		foreach($scores as $score){        			
        		   $weight=0;
        		   if($score['self_score']){
        			    $weight++;
        		   }
        	       if($score['manager_score']){
        	    	    $weight++;
        		   }
          		   if($score['instructor_score']){
          			    $weight++;
          		   }
        		   $averageScore[$i]=($score['self_score']+$score['manager_score']+$score['instructor_score'])/$weight; 
        		   
        		  $taskId[$i]=$score['taskid'];
        		  $taskName=$this->evaluationmodel->getTaskNameFromIns($insId,$taskId[$i]);       		        		  
        		  if(is_array($taskName)){
        		      foreach($taskName as $task){ 
        		      	if(is_array($task)){
        		      		foreach($task as $ta){
        		       	       $taskNames[$j]=$ta;
        		       	       $j++;
        		      		}
        		      	}
        		      }
        		  }       		   
        		   $i++;      	    
        	    }
        	}
        	else{
        		   $taskId[$i]='100000';
        		   $averageScore[$i]='0';   
        		   $taskNames[$i]="null";  		
        	}
        	$scoreAndTask=array();
        	for($j=0;$j<$i;$j++)
        	{
        	   $scoreAndTak[$j]['score']=$averageScore[$j];
        	   $scoreAndTak[$j]['task']=$taskNames[$j];
        	}

        	        		   
		$data = array(
		     'userId'=>$userId,
		     'insId'=>$insId,
			 'historyScores' =>$averageScore,
		     'taskNames' =>$taskNames,
		);        
       	        		  		
		$this->load->view('perSpace/hisEvaDetailView',$data);
   	
    }
}





?>