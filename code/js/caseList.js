	$(document).ready(function(){
		$("#ins_cre").attr("disabled",true);
		$("#caseList").click(function(){
			var selectObject = $("#caseList option:selected");
			var caseId = selectObject.val();
			alert(caseId);
			$.ajax({
				type:'post',
				url:"cc/getCaseInfo",
				data:"caseId="+caseId,
				dataType:'xml',
				success:function(ret){
					alert('hi');
				},
				error: function(){
					alert('ajax error');
				}
			});//end ajax
		});	//end function
	
		$("#ins_cre").click(function(){	
					var insname = $("#ins_name").val();
					if(insname == "" || insname.length < 6 || insname.length > 30){
						alert("实例名非法，请重新输入");
						$("#ins_name").val('');
						$("#ins_name").focus();
					}			
					else{
						reg=/^[a-zA-Z]\w{5,29}$/;     
						if(!reg.test(insname)){          
							   alert("实例名非法，请重新输入");
								$("#ins_name").val('');
								$("#ins_name").focus();   
						   }
						   else{
								alert("创建成功，正在准备跳转");
								var selectObject =$("#caseList option:selected");
								var selected = selectObject.get(0).value;
								var target = "ins/crins/" + selected;
								$("#cre").attr("action",target);
								document.getElementById('cre').submit();
							}
					}
								});
								   });