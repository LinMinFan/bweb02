// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(id,type,user)
{
	$.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
	{
		if(type=="1")
		{
			$("#vie"+id).text($("#vie"+id).text()*1+1)
			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
		}
		else
		{
			$("#vie"+id).text($("#vie"+id).text()*1-1)
			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
		}
	})
}
function sh(table,id,sh){
    $.post("./api/sh.php",{table,id,sh},()=>{
        location.reload()
    })
}
function del(table,id){
    $.post("./api/del.php",{table,id},()=>{
        location.reload()
    })
}

function front(url){
    location.href=`./index.php?do=${url}`;
}
function back(url){
    location.href=`./back.php?do=${url}`;
}
function reload(){
	location.reload();
}