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

 

