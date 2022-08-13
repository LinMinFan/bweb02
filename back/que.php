<fieldset class="w70 mg">
    <legend>新增問卷</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
    <table class="w100">
        <tr>
            <td class="w60 clo">問卷名稱</td>
            <td class="w40">
                <input type="text" name="subject">
            </td>
        </tr>
        <tr class="clo">
            <label>選項</label>
            <td>
                <input type="text" name="opt[]">
                <button type="button" id="mbt" onclick="adopt()">更多</button>            
            </td>
        </tr>
    </table>
    
    <div>
        <input type="submit" value="新增">|
        <input type="reset" value="清空">
    </div>
    </form>
    <script>
        function adopt(){
            $('#mbt').before("<br><label>選項</label><td><input type='text' name='opt[]'></td>")
        }
    </script>
    