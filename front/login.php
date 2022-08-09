<fieldset style="width:50%;margin:0 auto;">
    <legend>會員登入</legend>
    <table style="width:90%;margin:0 auto;">
        <tr>
            <td class="clo" style="width:40%;">帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td>
            <input type="password" name="pw" id="pw">
            </td>
        </tr>
    </table>
    <div style="width:90%;margin:0 auto;">
        <button onclick="login()">登入</button>
        <button onclick="reset()">清除</button>
        <span style="float:right;"><a href="?do=forgot">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></span>
    </div>
</fieldset>

<script>

function reset(){
    $('#acc').val("");
    $('#pw').val("");
}

function login(){
    let acc=$('#acc').val();
    let pw=$('#pw').val();
    $.post("./api/chk_acc.php",{acc},(chk_acc)=>{
        if (chk_acc==1) {
            $.post("./api/chk_pw.php",{acc,pw},(chk)=>{
                if (chk==1) {
                    if (acc=="admin") {
                    location.href="./back.php";
                    }else {
                    location.href="./index.php";
                    }
                }else {
                    alert("密碼錯誤")
                }
            })
        }else {
            alert("查無帳號")
        }
    })
}
</script>