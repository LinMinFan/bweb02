<fieldset class="w60 mg">
<legend>會員登入</legend>
<table class="w100">
    <tr>
        <td class="w45 clo">帳號</td>
        <td class="w45">
            <input type="text" name="" id="acc">
        </td>
    </tr>
    <tr>
        <td class="w45 clo">密碼</td>
        <td class="w45">
            <input type="password" name="" id="pw">
        </td>
    </tr>
</table>
<div class="ct">
    <span class="float_l">
    <button onclick="login($('#acc').val(),$('#pw').val())">登入</button>
    <button onclick="location.reload()">清除</button>
    </span>
    <spab class="float_r">
    <a href="?do=forgot">忘記密碼</a>
    <a href="?do=res">尚未註冊</a>
    </spab> 
</div>
</fieldset>
<script>
    function login(acc,pw){
        $.post("./api/login.php",{acc,pw},(res)=>{
            if (res==1) {
                alert("查無帳號");
                $('#acc').val('');
                $('#pw').val('')
            }else if(res==2){
                alert("密碼錯誤");
                $('#acc').val('');
                $('#pw').val('')
            }else{
                if (acc=='admin') {
                    back('main');
                }else{
                    front('main');
                }
            }
        })
    }
</script>