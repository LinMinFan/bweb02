<fieldset class="w60 mg">
    <legend>會員登入</legend>
    <table class="w100">
        <tr>
            <td class="clo w45">帳號</td>
            <td class="w45">
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo w45">密碼</td>
            <td class="w45">
                <input type="password" name="" id="pw">
            </td>
        </tr>
    </table>
    <div class="w100">
        <button class="float_l" onclick="login($('#acc').val(),$('#pw').val())">登入</button>
        <button class="float_l" onclick="ff('login')">清除</button>
        <a href="?do=res" class="float_r">尚未註冊</a>
        <a href="?do=forgot" class="float_r">忘記密碼|</a>
    </div>
</fieldset>
<script>
    function login(acc,pw){
        $.post("./api/login.php",{acc,pw},(res)=>{
            if (res==1) {
                alert("查無帳號");
                ff('login');
            }else if(res==2){
                alert("密碼錯誤");
                ff('login');
            }else{
                if (acc=='admin') {
                    bb('main');
                }else{
                    ff('main');
                }
            }
        })
    }
</script>