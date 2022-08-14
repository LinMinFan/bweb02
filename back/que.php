<fieldset class="w70 mg">
    <legend>新增問卷</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="w100">
            <tr>
                <td class="w20 clo">問卷名稱</td>
                <td class="w40">
                    <input type="text" name="subject">
                </td>
            </tr>
        </table>
        <div class="clo">
            <span>選項</span><input type="text" name="opt[]">
            <button type="button" onclick="adopt()" id="mbt">更多</button>
        </div>
        
        <div>
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>
        </form>

        <script>
            function adopt(){
                $('#mbt').before("<br><span>選項</span><input type='text' name='opt[]'>");
            }
        </script>
