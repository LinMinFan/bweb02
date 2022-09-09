function reload(){
    location.reload();
}
function del(table,id){
    $.post("./api/del.php",{table,id},()=>{
        reload();
    })
}
function sh(table,id,sh){
    $.post("./api/sh.php",{table,id,sh},()=>{
        reload();
    })
}
function ff(url){
    location.href="./index.php?do="+url;
}
function bb(url){
    location.href="./back.php?do="+url;
}

$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});

function login(table,acc,pw,code) {
    $.post("./api/login.php",{table,acc,pw,code},(res)=>{
        if (res==1) {
            alert("對不起，您輸入的驗證碼有誤\r請您重新登入");
        }else if (res==2) {
            alert("帳號或密碼錯誤");
        }else{
            if (table=='admin') {
                bb('admin');
            }else{
                ff('main');
            }
        }
    })
}
function chk_acc(acc){
    if (acc=='admin' || acc=="") {
        alert("不可使用");
    }else{
        $.post("./api/chk_acc.php",{acc},(res)=>{
            alert(res)
        })
    }
}