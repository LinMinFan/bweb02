<fieldset class="w60 mg">
    <legend>會員註冊</legend>
    <p class="red">*請設定您要註冊的帳號及密碼（最長 12 個字元）</p>
    <table class="w100">
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>
    <div>
    <span class="float_l">
        <button onclick="reg($('#acc').val(),$('#pw').val(),$('#pw2').val(),$('#email').val())">註冊</button>
        <button onclick="$('input').val('')">清除</button>
    </span>

    </div>
</fieldset>

<script>
    function reg(acc,pw,pw2,email){
        if (acc == "" || pw == "" || pw2 == "" || email== "") {
            alert("不可空白");
        }else if (pw!=pw2) {
            alert("密碼錯誤");
        }else {
            $.post("./api/reg.php",{acc,pw,email},(res)=>{
                alert(res);
                $('input').val('')
            })
        }
    }
</script>