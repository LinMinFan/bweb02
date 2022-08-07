<div style="width:60%;margin:0 auto">
    <fieldset>
        <legend>會員登入</legend>
        <table>
            <tr>
                <td class="clo" style="width:90%;">帳號</td>
                <td style="width:90%;"><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td class="clo">密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
        </table>
        <div>
            <button id="login" onclick="login()">登入</button>
            <button id="reset" onclick="reset()">清除</button>
            <span style="float:right;">
            <a href="?do=forgot" id="forgot">忘記密碼</a>|
            <a href="?do=reg" id="reg">尚未註冊</a>
        </span>
        </div>
    </fieldset>
</div>
<script>
    
    function login(){
        let acc=$('#acc').val();
        let pw=$('#pw').val();
        $.post("./api/chk_acc.php",{acc},(chkacc)=>{
            if (Number(chkacc)==1) {
                $.post("./api/chk_pw.php",{acc,pw},(chkpw)=>{
                    if (Number(chkpw)==1) {
                        if (acc=='admin') {
                            location.href="back.php";
                        }else {
                            location.href="index.php";
                        }
                    }else {
                        alert("密碼錯誤")
                        location.href="index.php";
                    }
                })
            }else {
                alert("查無帳號")
            }
        })
    }


    function reset() {
        acc=$('#acc').val("");
        pw=$('#pw').val("");
    }
</script>