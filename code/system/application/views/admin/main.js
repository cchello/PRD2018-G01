function check_all(obj,cName)  //checkbox选择所有项目
{
    var checkboxs = document.getElementsByName(cName);
    for(var i=0;i<checkboxs.length;i++)
    {
    	checkboxs[i].checked = obj.checked;
    }
}

function select_submit()
{
	var myform = document.forms[0];
	myform.checkboxs.value = "";
	
	if(!myform.checkbox.length)
		if(myform.checkbox.checked)
			myform.checkboxs.value = myform.checkbox.value;

	for(var i = 0; i < myform.checkbox.length; i++)
	{
		if(myform.checkbox(i).checked)
		{
			if(myform.checkboxs.value == "")
				myform.checkboxs.value = myform.checkbox(i).value;
			else
				myform.checkboxs.value +=  "," + myform.checkbox(i).value;
		}
	}
	myform.submit();
}

function singleselect()                    //用在inactiveuser页面
{

	var myform = document.forms['0'];
	var myform = document.forms[0];
	myform.checkboxs.value = "";
	
	if(!myform.checkbox.length)
		if(myform.checkbox.checked)
			myform.checkboxs.value = myform.checkbox.value;

	for(var i = 0; i < myform.checkbox.length; i++)
	{
		if(myform.checkbox(i).checked)
		{
			if(myform.checkboxs.value == "")
				myform.checkboxs.value = myform.checkbox(i).value;
			else
				myform.checkboxs.value +=  "," + myform.checkbox(i).value;
		}
	}
	myform.submit();
		
	
}

function do_delete()
{
	if(!confirm("确定要删除该信息吗？删除将不能恢复！"))
	    return false;
	select_submit();
}

function send()
{
	var myform = document.showmessage;
	myform.action = "<?php echo site_?>"
}

function changetype()      //不论选择的是simple还是complex,均让表单提交，
{                          //然后再控制器内判断提交的是什么，然后再确定行动
	var myform=document.typeform;
	if(document.typeform.searchtype.options['1'].selected)
	{
		myform.submit();
	}	
	else
		myform.submit();
}

function changesort()      //不论选择那一种排序方式,均让表单提交，
{                          //然后再控制器内判断提交的是什么，然后再确定行动
	var myform = document.forms[0];
	myform.submit();
}

function banselect()
{
	var myform = document.forms[1];
	myform.submit();
}



