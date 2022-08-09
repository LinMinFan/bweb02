<fieldset style="width:70%;margin:0 auto;">
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
    <table id="my_tb" style="width:90%;margin:0 auto;">
        <tr>
            <td class="clo" style="width:40%;">問卷名稱</td>
            <td>
                <input type="text" name="s_title" >
            </td>
        </tr>
        <tr>
            <td class="clo">選項</td>
            <td>
            <input type="text" name="s_opt[]">
            <button type="button" id="md_btn" onclick="more()">更多</button>
            </td>
            
        </tr>
    </table>
    <div style="width:90%;margin:0 auto;">
        <input type="submit" value="新增">|<input type="reset" value="清空">
    </div>
    </form>
</fieldset>

<script>
function more(){
    $('#md_btn').remove();
    $('#my_tb').append("<tr><td class='clo'>選項</td><td><input type='text' name='s_opt[]' ><button type='button' id='md_btn' onclick='more()'>更多</button></td></tr>")

}

</script>