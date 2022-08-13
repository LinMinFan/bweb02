<fieldset class="w60 mg_at">
    <legend>目前位置: 首頁 > 分類網誌 > <span class="po_title"></span></legend>
    <div class="flex">
        <fieldset class="w25">
            <legend>分類網誌</legend>
            <div>
                <a href="javascript:list_title('健康新知')" class="blo">健康新知</a>
                <a href="javascript:list_title('菸害防治')" class="blo">菸害防治</a>
                <a href="javascript:list_title('癌症防治')" class="blo">癌症防治</a>
                <a href="javascript:list_title('慢性病防治')" class="blo">慢性病防治</a>
            </div>
        </fieldset>
        <fieldset class="w70">
            <legend>文章列表</legend>
            <div class="po_content" >

            </div>
        </fieldset>
    </div>
</fieldset>

<script>
    list_title("健康新知");
    
    function list_title(text){
        $('.po_title').text(text);
        $.post("./api/list.php",{text},(res)=>{
            $('.po_content').html(res);
        })
    }

    function list_text(id){
        $.post("./api/text.php",{id},(res)=>{
            $('.po_content').html(res);
        })
    }
</script>