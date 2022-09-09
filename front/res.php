<fieldset class="w60 mg">
    <legend>會員註冊</legend>
    <div class="red">*請設定您要註冊的帳號及密碼（最長 12 個字元）</div>
    <table class="w100">
        <tr>
            <td class="w45 clo">Step1:登入帳號</td>
            <td class="w45">
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="w45 clo">Step2:登入密碼</td>
            <td class="w45">
                <input type="password" name="" id="pw">
            </td>
        </tr>
        <tr>
            <td class="w45 clo">Step3:再次確認密碼</td>
            <td class="w45">
                <input type="password" name="" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="w45 clo">Step4:信箱(忘記密碼時使用)</td>
            <td class="w45">
                <input type="text" name="" id="email">
            </td>
        </tr>
    </table>
    <div class="w100">
        <button class="" onclick="res($('#acc').val(),$('#pw').val(),$('#pw2').val(),$('#email').val())">註冊</button>
        <button class="" onclick="ff('res')">清除</button>
    </div>
</fieldset>
<script>
    function res(acc,pw,pw2,email){
        if (acc=="" || pw=="" || pw2=="" || email=="") {
                alert("不可空白");
            }else if (pw !=pw2) {
                alert("密碼錯誤");
            }else{
                $.post("./api/res.php",{acc,pw,email},()=>{
                    alert('註冊完成，歡迎加入');
                    ff('res')
                })
            }
    }
</script>