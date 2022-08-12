<div class="w100">
    <fieldset class="w60 mg">
        <legend>忘記密碼</legend>
        <p>請輸入信箱以查詢密碼</p>
        <table class="w100">
            <tr>
                <td ><input style="width:440px;" type="text" name="" id="email"></td>
            </tr>
            
        </table>
        <p class="ans"></p>
        <div>
            <button onclick="find_acc($('#email').val())">尋找</button>
            
        </div>
    </fieldset>
</div>

<script>
function find_acc(email){
    $.post("./api/chk_email.php",{email},(res)=>{
        $('.ans').html(res);
    })
}

</script>