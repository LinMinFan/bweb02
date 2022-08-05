<form action="./api/que.php" method="POST">
    <fieldset>
        <legend>新增問卷</legend>
        <div>
            <span class="clo">問券名稱</span>
            <span><input type="text" name="subject" id="subject"></span>
        </div>
        <div class="clo" id="options">
            <div >
                <span class="clo">選項</span>
                <span><input type="text" name="option[]"></span>
                <button type="button" onclick="more()">更多</button>
            </div>
        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>

    </fieldset>
</form>
<script>
    function more(){
        let = opt ='<div><span class="clo">選項</span><span><input type="text" name="option[]"></span></div>';
        $('#options').append(opt);
    }
</script>