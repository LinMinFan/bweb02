<fieldset class="w60 mg">
    <legend>新增問卷</legend>
    <form action="./api/add.php?do=<?=$do;?>" method="post">
    <table class="w100">
        <tr>
            <td class="w45 ct">問卷名稱</td>
            <td class="w45">
                <input type="text" name="text">
            </td>
        </tr>
    </table>
    <div class="w100 clo">
        <label for="">選項</label>
        <input type="text" name="opt[]">
        <button type="button" onclick="add()" id="opt">更多</button>
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </div>
    </form>
</fieldset>
<script>
   function add(){
    $('#opt').before(`
    <br>
    <label for="">選項</label>
    <input type="text" name="opt[]">
    `)
   }
</script>