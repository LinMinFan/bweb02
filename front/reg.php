<div style="width:60%;margin:0 auto">
    <fieldset>
        <legend>會員註冊</legend>
        <p style="color:#f00">*請設定您要註冊的帳號及密碼（最長12個字元）</p>
        <table>
            <tr>
                <td class="clo" style="width:90%;">Step1：登入帳號</td>
                <td style="width:90%;"><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td class="clo">Step2：登入密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td class="clo">Step3：再次確認密碼</td>
                <td><input type="password" name="pw2" id="pw2"></td>
            </tr>
            <tr>
                <td class="clo">Step4：信箱(忘記密碼時使用)</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
        </table>
        <div>
            <button id="login" onclick="reg()">註冊</button>
            <button id="reset" onclick="reset()">清除</button>
            
        </div>
    </fieldset>
</div>
<script>
    
    function reg(){
        let acc=$('#acc').val();
        let pw=$('#pw').val();
        let pw2=$('#pw2').val();
        let email=$('#email').val();
        if (acc=="" || pw=="" || pw2=="" || email=="") {
            alert("不可空白");
        }else if(pw != pw2){
                alert("密碼錯誤");
            }else {
                $.post("./api/reg.php",{acc,pw,email},(res)=>{
                    alert(res);
                    if (res=="歡迎加入") {
                        location.href="?do=login";
                    }
                })
            }
        }
    



    function reset() {
        acc=$('#acc').val("");
        pw=$('#pw').val("");
        pw=$('#pw2').val("");
        pw=$('#email').val("");
    }
</script>