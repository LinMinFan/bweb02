<fieldset class="w80 mg_at">
    <legend>新增問卷</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
    <table class="w100 mg_at">
        <tr>
            <td class="clo w45">問卷名稱</td>
            <td class="w45">
                <input type="text" name="text" id="">
            </td>
        </tr>
        <tr>
            <td class="clo">
                <label>選項</label>
                <input type="text" name="opt[]">
                <button type="button" id="mybt" onclick="adopt()">更多</button>
            </td>
        </tr>
    </table>
    
    <div class="w100">
        <span >
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </span>
    </div>
    </form>
    
</fieldset>

<script>
    function adopt(){
        $('#mybt').before("<br><label>選項</label><input type='text' name='opt[]'>");
    }
</script>