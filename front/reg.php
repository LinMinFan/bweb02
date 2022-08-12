<div class="w100">
    <fieldset class="w60 mg">
        <legend>會員註冊</legend>
        <p style="color: #f00;">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
        <table class="w100">
            <tr>
                <td class="clo w50">Step1:登入帳號</td>
                <td ><input type="text" name="" id="acc"></td>
            </tr>
            <tr>
                <td class="clo w50">Step2:登入密碼</td>
                <td ><input type="password" name="" id="pw"></td>
            </tr>
            <tr>
                <td class="clo w50">Step3:再次確認密碼</td>
                <td ><input type="password" name="" id="pw2"></td>
            </tr>
            <tr>
                <td class="clo w50">Step4:信箱(忘記密碼時使用)</td>
                <td ><input type="text" name="" id="email"></td>
            </tr>
        </table>
        <div>
            <button onclick="reg()">註冊</button>
            <button onclick="$('#acc').val('');$('#pw').val('');$('#pw2').val('');$('#email').val('')">清除</button>
            
        </div>
    </fieldset>
</div>

<script>
function reg(){
    let acc=$('#acc').val();
    let pw=$('#pw').val();
    let pw2=$('#pw2').val();
    let email=$('#email').val();
    if (acc=="" || pw=="" || pw2=="" || email=="" ) {
        alert("不可空白");
    }else {
        if (pw != pw2) {
            alert("密碼錯誤");
        }else {
            $.post("./api/chk_acc.php",{acc},(res)=>{
                if (res==1) {
                    alert("帳號重複");
                }else {
                    $.post("./api/reg.php",{acc,pw,email},(res)=>{
                        alert("註冊完成，歡迎加入");
                        location.reload();
                    })
                }
            })
        }
    }
    
}

</script>