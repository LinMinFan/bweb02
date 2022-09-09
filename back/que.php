<fieldset class="w60 mg">
    <legend>新增問卷</legend>
    <form action="./api/add_que.php?do=<?=$do;?>" method="post">
<table class="w100">
    <tr>
        <td class="clo w45">問卷名稱</td>
        <td class="w45">
            <input type="text" name="text">
        </td>
</tr>
</table>
<div class="clo">
    <span>選項</span>
    <input type="text" name="text2[]">
    <button type="button" onclick="ad_opt()" id="mbt">更多</button>
</div>
<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="清空">
</div>
</form>
</fieldset>
<script>
    function ad_opt(){
        $('#mbt').before(`
        <br>
        <span>選項</span>
        <input type="text" name="text2[]">
        `)
    }
</script>

