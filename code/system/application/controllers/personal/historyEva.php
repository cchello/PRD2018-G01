<?php
class HistoryEva extends Controller{
	function HistoryEva(){
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
        $user_id = $this->session->userdata('user_id');       
        $instanceid=$this->evaluationmodel->getInstanceId($user_id);
        $index=0;        
        $allScore=array();
        $caseName=array();
        $instanceId=array();
        
            if(is_array($instanceid)){
   	        foreach($instanceid as $instance){
   	        	if(is_array($instance)){
   	  	          foreach($instance as $ins){ 
   	  	             $scores=$this->evaluationmodel->getUserScore($ins);
   	  	             $casenames=$this->evaluationmodel->getCaseName($ins);
   	  	          
   	  	              if(is_array($scores)){
   	  	              	foreach($scores as $score){
   	  	              	   if(is_array($score)){
   	  	              	        foreach($score as $s){
   	  	          		            $allScore[$index]=$s;
   	  	              	        }
   	  	              	   }
   	  	          	    }
   	  	              }

   	  	             if(is_array($casenames)){
   	  	          	    foreach($casenames as $casename){
   	  	          	        if(is_array($casename)){
   	  	          	            foreach($casename as $case){
   	  	          		            $caseName[$index]=$case;
   	  	          	            }
   	  	          	        }
   	  	          	    }
   	  	             }
   	  	                $instanceId[$index]=$ins;
   	  	                $index++;	          
   	  	         }
   	           }  	
           }
        }
        
        $data=array(
        	'userid'=>$user_id,
            'scores'=>$allScore,
            'caseNames'=>$caseName,
            'instanceid'=>$instanceId
        	);
        
         $this->load->view('perSpace/historyEvaluation',$data);
    }
}
?>