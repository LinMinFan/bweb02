<fieldset class="w50 mg">
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <table class="w100">
        <tr>
            <td class="w50">
                <input type="text" name="" id="email">
            </td>
        </tr>

    </table>
    <p class="find_pw"></p>
    <div class="ct w100 ">
        <span class="float_l">
            <button onclick="find_pw($('#email').val())">尋找</button>
        </span>
        
    </div>
</fieldset>

<script>
    function find_pw(email){
        $.post("./api/find_pw.php",{email},(res=>{
            $('.find_pw').html(res);
        }))
    }
</script>