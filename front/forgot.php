<fieldset class="w60 mg">
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <table class="w100">
            <tr>
                <td>
                    <input style="width:380px;" type="text" name="" id="email">
                </td>
            </tr>
    </table>
    <p class="pw_ask"></p>
    <div>
            <button onclick="find_pw($('#email').val())">尋找</button>
    </div>
</fieldset>

<script>

function find_pw(email,){
    $.post("./api/find_pw.php",{email},(res)=>{
      $('.pw_ask').html(res);
    })
}

</script>