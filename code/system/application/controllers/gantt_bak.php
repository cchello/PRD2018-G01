<?php
class Gantt extends Controller
{
	function Gantt()
	{
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		require_once ("./jpgraph/jpgraph.php");
		require_once ("./jpgraph/jpgraph_gantt.php");
	}
	
	function index()
	{
		
		$instanceid = $this->session->userdata('ins_id');
		$instanceid=12;
		if($instanceid)
		{
			$instance = $this->instance_model->getInstanceByid($instanceid);
			if(!empty($instance))
			{
				$project['id'] = $this->instance_model->getCaseid($instanceid);
				$project['name'] = $instance['instancename'];
				$project['starttime'] = strtotime("2009-01-01");
				$caseid = $instance['caseid'];
				$project['tasks'] =  $this->casemodel->getTasksByCaseid($caseid);
			}
		}
		else{
			$caseid=27;
			$project['id']=$caseid;
			$project['name'] = '软件工程教学、学习、交流系统';
			$project['starttime'] = strtotime("2009-01-01");;
			$project['tasks'] =  $this->casemodel->getTasksByCaseid($project['id']);
		}

		$ganttpath="system/application/uploadedfile/case_$caseid/ins_$instanceid/gantt.png";		
//		echo $instanceid;
//		echo "aaa";
//		exit;
//		echo $project['starttime'];
////		$starttime = $project['starttime'];
//		$start = date("Y-m-d",($starttime+3600*24*2));
//		echo $start;
//		exit;
		
		if(!file_exists($ganttpath)){
		
			$graph = new GanttGraph();
			
			$title = $project['name'];
			$graph->title->Set($title);
			$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
			 
			// Setup some "very" nonstandard colors
			$graph->SetMarginColor('lightgreen@0.8');
			$graph->SetBox(true,'yellow:0.6',2);
			$graph->SetFrame(true,'darkgreen',4);
			$graph->scale->divider->SetColor('yellow:0.6');
			$graph->scale->dividerh->SetColor('yellow:0.6');
	//		$graph->scale->dividerh->SetColor('red');
			 
			// Explicitely set the date range
			// (Autoscaling will of course also work)
	//		$graph->SetDateRange('2001-11-06','2002-1-10');
			 
			// Display month and year scale with the gridlines
			$graph->ShowHeaders(GANTT_HMONTH | GANTT_HDAY | GANTT_HWEEK );
			$graph->scale->month->SetFont(FF_SIMSUN,FS_BOLD);
			$graph->scale->month->grid->SetColor('gray');
			$graph->scale->month->grid->Show(true);
			$graph->scale->week->SetFont(FF_SIMSUN,FS_BOLD);
			$graph->scale->week->grid->SetColor('gray');
			$graph->scale->week->grid->Show(true);
			 
			 
			//Setup spanning title
	//		$graph->scale->tableTitle->Set( 'Phase 1' );
	//		$graph->scale->tableTitle->SetFont( FF_ARIAL , FS_NORMAL , 16 );
	//		$graph->scale->SetTableTitleBackground( 'darkgreen@0.6' );
	//		$graph->scale->tableTitle->Show( true );
	//		 
			// Setup activity info
			 
			// For the titles we also add a minimum width of 100 pixels for the Task name column
			$graph->scale->actinfo->SetColTitles(array('名称','wbs','耗时','开始日期','结束日期'),array(100));
			$graph->scale->actinfo->SetBackgroundColor('green:0.5@0.5');
			$graph->scale->actinfo->SetFont(FF_SIMSUN,FS_BOLD,10);
			$graph->scale->actinfo->vgrid->SetStyle('solid');
			$graph->scale->actinfo->vgrid->SetColor('gray');
	 
			// Data for  activities
	
			$tasks = $project['tasks'];
			$starttime = $project['starttime'];
//			echo $starttime;
	
			foreach ($tasks as $row)
			{
				if($row['taskid']==0)
					continue;
				$start = date("Y-m-d",($starttime+3600*24*$row['earlystart']));
				$finish = date("Y-m-d",($starttime+3600*24*($row['earlyfinish']-1)));
				$duration = $row['duration'];
	//			print_r($row);
	//			exit;
				if($row['ismilestone']==0){
					$activity = new GanttBar($row['taskid']-1, array($row['taskid'].' '.$row['taskname'],$row['WBS'],"$duration",$start,$finish), $start, $finish,"[0%]");
				}else{
					$activity = new MileStone($row['taskid']-1, array($row['taskid'].' '.$row['taskname'],$row['WBS'],"$duration",$start,$finish), $start, $finish);
				}
				$activity->title->SetFont(FF_SIMSUN,FS_BOLD,10);
				$graph->Add($activity);
		
				$successors = $this->casemodel->getSuccessors($project['id'],$row['taskid']);
				if(!empty($successors))
					foreach($successors as $successor)
						$activity->SetConstrain($successor['successorid']-1,CONSTRAIN_ENDSTART);	
			}	
	 
			// Output the chart
			$graph->Stroke("$ganttpath");
		}
?>
<img src="<?php echo base_url().$ganttpath;?>"/>

<?php 
//		return base_url().$ganttpath;
	
	}
}
