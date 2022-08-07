<style>
    .emailbox{
        border: 1px solid #000;
    }
</style>

<div class="emailbox" style="width:60%;margin:0 auto">
    <p>請輸入信箱以查詢密碼</p>
    <table style="width:90%;">
        <tr>
            <td><input style="width:100%;" type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div id="chk_email"></div>
    <div>
        <button id="login" onclick="forgot()">尋找</button>
    </div>
</div>
<script>
function forgot(){
    let email=$('#email').val();
    $.get("./api/chk_email.php",{email},(res)=>{
        $('#chk_email').html(res);
    })
}

</script>