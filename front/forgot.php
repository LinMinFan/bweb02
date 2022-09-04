<fieldset class="w60 mg">
<legend>忘記密碼</legend>
<div>請輸入信箱以查詢密碼</div>
<table class="w100">
    <tr>
        <td class="w80">
            <input type="text" name="" id="email">
        </td>
    </tr>
</table>
<div class="find_pw"></div>
<div class="ct">
    <span class="float_l">
    <button onclick="find_pw($('#email').val())">尋找</button>
    </span>
</div>
</fieldset>
<script>
    function find_pw(email){
        $.post("./api/find_pw.php",{email},(res)=>{
            $('.find_pw').html(res);
        })
    }
</script>