<fieldset class="w80 mg">
    <legend>新增問卷</legend>
    <form action="./api/add.php?do=<?= $do; ?>" method="post">
    <table class="w100">
        <tr>
            <td class="w50 clo">問卷名稱</td>
            <td class="w50">
            <input type="text" name="subject">
            </td>
        </tr>
    </table>
    <div class="clo">
        <label>選項</label>
        <input type="text" name="opt[]">
        <button type="button" onclick="ad_opt()" id="mbtn">更多</button>
    </div>
    
    <div class="ct">
        <input type="submit" value="新增">|
        <input type="reset" value="清空">
    </div>
    </form>
    
</fieldset>

<script>
   function ad_opt(){
    $('#mbtn').before(`
    <br>
    <label>選項</label>
    <input type="text" name="opt[]">
    `)
   }
</script>