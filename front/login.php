<div class="w100">
    <fieldset class="w60 mg">
        <legend>會員登入</legend>
        <table class="w100">
            <tr>
                <td class="clo w40">帳號</td>
                <td ><input type="text" name="" id="acc"></td>
            </tr>
            <tr>
                <td class="clo w40">密碼</td>
                <td ><input type="password" name="" id="pw"></td>
            </tr>
        </table>
        <div>
            <button onclick="login()">登入</button>
            <button onclick="$('#acc').val('');$('#pw').val('')">清除</button>
            <span class="flr">
                <a href="?do=forgot">忘記密碼</a>|
                <a href="?do=reg">尚未註冊</a>
            </span>
        </div>
    </fieldset>
</div>

<script>
function login(){
    let acc=$('#acc').val();
    let pw=$('#pw').val();
    $.post("./api/chk_acc.php",{acc},(res)=>{
        if (res==1) {
            $.post("./api/chk_pw.php",{acc,pw},(res)=>{
                if (res==1) {
                    if (acc=="admin") {
                        location.href="./back.php";
                    }else{
                        location.href="./index.php";
                    }
                }else {
                    alert("密碼錯誤");
                    location.reload();
                }
            })
        }else{
            alert("查無帳號");
            location.reload();
        }
    })
}

</script>