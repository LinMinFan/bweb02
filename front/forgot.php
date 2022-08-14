<fieldset class="w60 mg">
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <table class="w100 mg">
        <tr>
            <td class="w100">
                <input style="width:380px" type="text" name="" id="email">
            </td>
        </tr>
    </table>
    <p class="find_pw"></p>
    <div>
        <span class="float_l">
            <button onclick="find_pw($('#email').val())">尋找</button>
        </span>

    </div>
</fieldset>

<script>
function find_pw(email){
    $.post("./api/email.php",{email},(res)=>{
        $('.find_pw').html(res);
    })
}
</script>