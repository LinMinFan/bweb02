<fieldset class="w60 mg">
    <legend>尚未註冊</legend>
    <p class="red">*請設定您要註冊的帳號及密碼（最長 12 個字元）</p>
    <table class="w100 mg">
        <tr>
            <td class="clo w45">Step1:登入帳號</td>
            <td class="w45">
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo w45">Step2:登入密碼</td>
            <td class="w45">
                <input type="password" name="" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo w45">Step3:再次確認密碼</td>
            <td class="w45">
                <input type="password" name="" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo w45">Step4:信箱(忘記密碼時使用)</td>
            <td class="w45">
                <input type="text" name="" id="email">
            </td>
        </tr>
    </table>
    <div>
        <span class="float_l">
            <button onclick="reg($('#acc').val(),$('#pw').val(),$('#pw2').val(),$('#email').val())">註冊</button>
            <button onclick="$('#acc').val(''),$('#pw').val(''),$('#pw2').val(''),$('#email').val('')">清除</button>
        </span>

    </div>
</fieldset>

<script>
function reg(acc,pw,pw2,email){
    if (acc=="" || pw=="" || pw2=="" || email=="") {
        alert("不可空白");
    }else if(pw != pw2){
        alert("密碼錯誤");
    }else {
        $.post("./api/reg.php",{acc,pw,email},(res)=>{
            alert(res);
            location.reload();
        })
    }
}
</script>