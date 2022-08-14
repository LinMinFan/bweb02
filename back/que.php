<fieldset class="w60 mg">
    <legend>問卷管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="w100">
           <tr>
            <td class="clo w30">
                <label>問卷名稱</label>
            </td>
            <td class="w30">
                <input type="text" name="subject" >
            </td>
           </tr>
        </table>
        <div class="opt_box clo w100">
            <span>選項</span><input type="text" name="opt[]">
            <button type="button" id="mbtn" onclick="adopt()">更多</button>
        </div>
        <div >
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>
    </form>
    
    
</fieldset>

<script>
    function adopt(){
        $('#mbtn').before("<br><span>選項</span><input type='text' name='opt[]'>")
    }



</script>