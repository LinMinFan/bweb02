<fieldset class="w60 mg_at">
    <legend>會員登入</legend>
    <table class="w100 mg_at">
        <tr>
            <td class="clo w45">帳號</td>
            <td>
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo w45">密碼</td>
            <td>
                <input type="password" name="" id="pw">
            </td>
        </tr>
    </table>
    <div class="w100">
        <span class="float_l"><button onclick="login($('#acc').val(),$('#pw').val())">登入</button> <button onclick="$('#acc').val(''),$('#pw').val('')">清除</button></span>
        <span class="float_r"><a href="?do=forgot">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></span>
    </div>
</fieldset>

<script>
    function login(acc,pw){
        $.post("./api/login.php",{acc,pw},(res)=>{
            if (res==0) {
                alert("查無帳號");
            }else if(res==1){
                alert("密碼錯誤")
            }else {
                if (acc=="admin") {
                    location.href="back.php";
                }else {
                    location.href="index.php";
                }
            }
        })
    }
</script>