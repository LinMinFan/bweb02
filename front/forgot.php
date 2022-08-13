<fieldset class="w60 mg_at">
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <table class="w100 mg_at">
        <tr>
            <td>
                <input style="width: 400px;" type="text" name="" id="email">
            </td>
        </tr>
       
    </table>
    <p class="ans"></p>
    <div class="w100">
        <span class="float_l"><button onclick="find_pw($('#email').val())">尋找</button> </span>
    </div>
</fieldset>

<script>
    function find_pw(email){
        $.post("./api/find_pw.php",{email},(res)=>{
            $('.ans').text(res);
        })
    }

</script>