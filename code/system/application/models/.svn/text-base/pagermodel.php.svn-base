<?php 
class Pagermodel extends Model
{
 private $result;
 private $page_count;
 private $page_per_page=5;
 private $current_page;

  function Pagermodel(){
  	
  	  parent::Model();
  }
  
 function secToHour($second){
 	$sec=$second%60;
 	$second=round($second/60);
 	if($second>=60){
 		$hour=round($second/60);
 		$minute=$second%60;
 		$res=$hour."小时".$minute."分钟".$sec."秒";
 	}else{
 		$res=$second."分钟".$sec."秒";
 	}
 	return $res;
 }
 
  function setPagermodel($result_array, $current_page, $results_per_page) {
 
        if(!$result_array){
           echo "<div align=center>数据库未运行，结果集错误</div>\n";  
           return;
        }else{
           $this->result = $result_array;
        }
 
   if(!empty($results_per_page)) {
   	    $this->results_per_page = $results_per_page;
   }
 
   $numrows = count($this->result);  
   if(!$numrows) {
      echo "<div align=center>查询结果为空.</div>\n";
      return;
      }
 
   $this->page_count = ceil($numrows/$this->results_per_page);  
   
         if(!$current_page || $current_page < 0) {
      	    $this->current_page = 1;
       }else{
            $this->current_page = $current_page;   	
       } 
   
      if($current_page>$this->page_count){
   	       $this->current_page=$current_page-1;
        }
 }
 
function print_results($myrank) { 
    $start = ($this->current_page - 1) * $this->results_per_page;
  
           if($start+$this->results_per_page > count($this->result)){
           	   $topLimit=count($this->result);
           }else{
           	   $topLimit=$start+$this->results_per_page;
           }
           
    
          for($index=$start;$index< $topLimit;$index++){
          	  $user=$this->result[$index];
          	     $time=$this->secToHour($user['onlinetime']);
               	 if($index==$myrank){
               	          if(($index%2)==0){
   	   		   echo "<tr class='rankgray' id='mytr'>
                     <td>".($index+1)."</td>
                     <td class='userName'>".$user['username']."</td>
                     <td>".$user['score']."</td>
                     <td>".$time."</td>"."</tr>";  	   		
   	   	  }else{
   	   	  	   	echo "<tr id='mytr'>
                      <td>".($index+1)."</td>
                      <td class='userName'>".$user['username']."</td>
                      <td>".$user['score']."</td>
                      <td>".$time."</td>"."</tr>"; 	   	  	   	 	   	  	
   	   	       }
               	 	
               	 }else{
               	          if(($index%2)==0){
   	   		   echo "<tr class='rankgray' >
                     <td>".($index+1)."</td>
                     <td class='userName'>".$user['username']."</td>
                     <td>".$user['score']."</td>
                     <td>".$time."</td>"."</tr>";  	   		
   	   	  }else{
   	   	  	   	echo "<tr >
                      <td>".($index+1)."</td>
                      <td class='userName'>".$user['username']."</td>
                      <td>".$user['score']."</td>
                      <td>".$time."</td>"."</tr>"; 	   	  	   	 	   	  	
   	   	       }               	 	
              }	     	  	       	
         }
 }
 
function print_case_results() { 
    $start = ($this->current_page - 1) * $this->results_per_page;
  
           if($start+$this->results_per_page > count($this->result)){
           	   $topLimit=count($this->result);
           }else{
           	   $topLimit=$start+$this->results_per_page;
           }
               
          for($index=$start;$index< $topLimit;$index++){
          	  $case=$this->result[$index];
          	              
           if(($index%2)==0){
   	   		   echo "<tr class='rankgray' id='mytr'>
                     <td>".($index+1)."</td>
                     <td class='userName'>".$case['caseid']."</td>
                     <td>".$case['casename']."</td>
                     <td>".$case['count']."</td>"."</tr>";  	   		
   	   	  }else{
   	   	  	   	echo "<tr id='mytr'>
                      <td>".($index+1)."</td>
                      <td class='userName'>".$case['caseid']."</td>
                      <td>".$case['casename']."</td>
                      <td>".$case['count']."</td>"."</tr>"; 	   	  	   	 	   	  	
   	   	       }                 	  	       	
         }
 }
 
 function get_current_page(){
 	return $this->current_page;
 }
}
?>