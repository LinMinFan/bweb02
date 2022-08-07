<style>
    .optbox{
        display: flex;
        width: 100%;
        flex-wrap: wrap;
    }
</style>
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="POST">
    <div>
        <div><span class="clo">問券名稱</span><input type="text" name="subject"></div>
    </div>
    <div class="clo optbox">
        <div  id="opts"><div><span>選項</span><input type="text" name="opt[]"></div></div>
        <button id="mmb" type="button" onclick="adopt()">更多</button>
    </div>
    <div><input type="submit" value="新增">|<input type="reset" value="清空"></div>
    </form>
</fieldset>

<script>
    function adopt(){
        $('#opts').append("<div><span>選項</span><input type='text' name='opt[]'></div>");
        $('#mmb').remove();
        $('#opts').append("<button id='mmb' type='button' onclick='adopt()'>更多</button>");
    }
</script>