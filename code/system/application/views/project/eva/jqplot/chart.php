<?php    

       $line='[';
       $index=1;
       if(is_array($historyScores) && count($historyScores)>1){
               foreach($historyScores as $historyScore){
               	   $line=$line.'['.$index.','.$historyScore.']'.',';
               	   $index++;
               }
       	   $line=$line.']';
       }else{
       	$line=$line.'[1'.','.$historyScores[0].']'.']';
       }
       
       $ticks='[';
       if(is_array($taskNames)) {
     	 foreach($taskNames as $taskName){		
             $ticks=$ticks.'\''.$taskName.'\''.',';
     	 }
       }
      for($i=count($taskNames)+1;$i<count($taskNames)+5;$i++){
       $ticks=$ticks.'\''.$i.'\''.',';
       }
       $ticks=$ticks.']'.',';
      
?>
  <script language="JavaScript" type="text/javascript">
	 $("document").ready(function(){   
		 var line=<?php echo $line;?>  
	     $.jqplot('chartdiv',  [line],
			  { title:'学习情况统计',
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
		        	  tooltipSeparator: ' : '
		        	  } 

			  });
			  });
 </script>
 <div id="chartdiv" style="height: 400px; width: 500px;"> </div>

   <div class="mainbody">
        <h3>得分记录</h3>
        <p>这里列出了您所有的所有详细得分记录。</p>
        <br />
        <table width="400" border="1">
            <tr style="font-size:12px">
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>项目名称</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>项目得分</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>详情</strong></td>
            </tr>
  <?php    
      if(is_array($taskNames)) {
      	$j=0;
         	 foreach($taskNames as $taskName){		
             ?>
                     <tr style="font-size:12px">
                     <td height="20" align="center"><?php echo $taskName;?></td>
                     <td height="20" align="center"><?php echo $historyScores[$j];$j++;?></td>
                     <td height="20" align="center">点击查看</td>                         
                  </tr> 
             <?php 
     	    }
        }
     	 ?>  
		                  
             	  				   
        </table>
        <hr />
       
    </div> 

