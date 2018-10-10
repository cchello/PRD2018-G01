<?php    
       $line='[';
       $index=1;
       if(is_array($scores) && count($scores)>=1){
               foreach($scores as $score){
               	   $line=$line.'['.$index.','.$score.']'.',';
               	   $index++;
               }
       	   $line=$line.']';
       }else{
       	$line=$line.']';
       }
       
       $ticks='[';
       if(is_array($caseNames)) {
     	 foreach($caseNames as $taskName){		
             $ticks=$ticks.'\''.$taskName.'\''.',';
     	 }
       }
      for($i=count($caseNames)+1;$i<count($caseNames)+10;$i++){
       $ticks=$ticks.'\''.$i.'\''.',';
       }
       $ticks=$ticks.']'.',';   
       
?>

  <script language="JavaScript" type="text/javascript">
	 $("document").ready(function(){	

			$(".showBar").livequery("click",function(){
				 var insId = $(this).attr("name");
				$("#mainContent").load("personal/hisEvaDetail",{insId:insId});
			});
			  		  		  
		 var line=<?php echo $line;?>  
	     $.jqplot("chartdiv",  [line],
			  { title:'参与案例得分情况统计',
			    axes:{
			          xaxis:{
			        	  ticks:<?php echo $ticks;?>   
					      renderer: $.jqplot.CategoryAxisRenderer,	
			              tickRenderer: $.jqplot.CanvasAxisTickRenderer,
			              tickOptions: {
			                enableFontSupport: true,
			                  angle: 30}			      
			          },	
			          yaxis:{min:0, max:100}        
	            },			          
			    series:[{color:'#5FAB78'}],

		        highlighter: { 
		        	  lineWidthAdjust: 50, 
		        	  sizeAdjust: 10, 
		        	  showTooltip: true, 
		        	  tooltipLocation: 'nw',
		        	  tooltipAxes: 'xy',  
		        	  tooltipSeparator: ':'
		        	  } 

			  });

	 });

	  
 </script>
  
 <div id="chartdiv" style="height: 500px; width: 700px;"> </div>
 
   <div class="mainbody" id="detail">
        <h3>得分记录</h3>
        <p>这里列出了您所有的所有详细得分记录。</p>
        <br />
        <table width="600" border="1">
            <tr style="font-size:12px">
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>实例编号</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>项目名称</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>项目得分</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>详情</strong></td>
            </tr>
  <?php    
      if(is_array($caseNames)) {
      	$j=0;
         	 foreach($caseNames as $taskName){		
             ?>
                     <tr style="font-size:12px">                 
                     <td height="20" align="center"><?php echo $instanceid[$j];?></td>
                     <td height="20" align="center"><?php echo $taskName;?></td>
                     <td height="20" align="center"><?php echo $scores[$j];?></td>
                     <td height="20" align="center"><a href="#" class="showBar" name=<?php echo $instanceid[$j]; $j++;?>>点击查看</a></td>                         
                  </tr> 
             <?php 
     	    }
        }
     	 ?>
                     	  				   
        </table>       
    </div> 
