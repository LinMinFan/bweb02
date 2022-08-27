<fieldset class="w100">
    <legend>新增問卷</legend>
    <form action="./api/add.php?do=<?=$do?>" method="POST">
    <table class="w80">
        <tr>
            <td class="clo w45">問卷名稱</td>
            <td class="w45">
                <input type="text" name="text">
            </td>
        </tr>
    </table>
    <div class="w80 clo">
    <label >選項</label>
    <input type="text" name="text2[]">
    <button id="mybtn" type="button" onclick="add_text2()">更多</button>
    </div>
    <div class="w80">
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </div>
    </form>
</fieldset>
<script>
function add_text2(){
    $('#mybtn').before(`
    <br>
    <label >選項</label>
    <input type="text" name="text2[]">
    `)
}
</script>