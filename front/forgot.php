<fieldset class="w70 mg">
    <legend>s忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <table class="w100">
        <tr>
            <td class="w100">
                <input style="width:400px;" type="text" name="" id="email">
            </td>
        </tr>
    </table>
    <span class="pw_ans"></span>
<div>
    <span >
        <button onclick="find_pw($('#email').val())">尋找</button>
    </span>
    
</div>
</fieldset>
<script>
    function find_pw(email){
        $.post("./api/find_pw.php",{email},(res)=>{
            $('.pw_ans').html(res);
        })
    }
</script>