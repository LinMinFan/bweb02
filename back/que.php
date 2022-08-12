<div class="w100">
    <fieldset class="w80 mg">
        <legend>新增問卷</legend>
        <form action="./api/edit.php?do=<?= $do; ?>" method="post">
            <div class="w100">
                <label class="w40" for="">問卷名稱</label>
                <input class="w40" type="text" name="title">
            </div>
            <div class="w100 clo">
                <label for="選項"></label>
                <input type="text" name="text[]">
                <button id="mbtn" onclick="adopt()" type="button">更多</button>
            </div>


            <div><input type="submit" value="新增">|<input type="reset" value="清空"></div>
        </form>

        <script>
            function adopt(){
                $('#mbtn').before("<br><label for='選項'></label><input type='text' name='text[]'>")
            }
        </script>