<fieldset class="w60 mg">
    <legend>忘記密碼</legend>
    <div class="">請輸入信箱以查詢密碼</div>
    <table class="w100">
        <tr>
            <td class="w45">
                <input type="text" name="" id="email">
            </td>
        </tr>
        <tr>
            <td class="res"></td>
        </tr>
    </table>
    <div class="w100">
        <button class="float_l" onclick="find_pw($('#email').val())">尋找</button>
    </div>
</fieldset>
<script>
    function find_pw(email){
        $.post("./api/find_pw.php",{email},(res)=>{
            $('.res').text(res);
        })
    }
</script>