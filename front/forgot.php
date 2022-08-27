<fieldset class="w60 mg">
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <table class="w100">
        <tr>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>
    <p class="result"></p>
    <div>
    <span class="float_l">
        <button onclick="find_pw($('#email').val())">尋找</button>
    </span>

    </div>
</fieldset>

<script>
    function find_pw(email){
        $.post("./api/find_pw.php",{email},(res)=>{
           $('.result').text(res);
        })
    }
</script>