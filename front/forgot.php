<div style="width:60%;margin:0 auto;border:1px solid #000;">
<table style="width:100%;">
    <tr>
        <td>請輸入信箱以查詢密碼</td>
    </tr>
    <tr>
        <td>
            <input type="text" name="mail" id="mail" style="width:80%;">
        </td>
    </tr>
</table>
<p class="rlt"></p>
<div><button onclick="findacc()">尋找</button></div>
</div>

<script>
    function findacc(){
        let email=$('#mail').val();
        $.get("./api/find_acc.php",{email},function(res){
            $('.rlt').html(res);
        })
    }
</script>