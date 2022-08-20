<fieldset class="w90 flex flex_jc">
    <legend>目前位置：首頁 > 分類網誌 <span class="po_title"></span></legend>
    <fieldset class="w20">
        <legend>分類網誌</legend>
        <a href="javascript:list('健康新知')" class="blo">健康新知</a>
        <a href="javascript:list('菸害防治')" class="blo">菸害防治</a>
        <a href="javascript:list('癌症防治')" class="blo">癌症防治</a>
        <a href="javascript:list('慢性病防治')" class="blo">慢性病防治</a>
    </fieldset>
    <fieldset class="w50">
        <legend>文章列表</legend>
        <div class="po_content"></div>
    </fieldset>
</fieldset>

<script>
    list('健康新知')
    function list(text){
        $('.po_title').text(text);
        $.post("./api/list.php",{text},(res)=>{
            $('.po_content').html(res);
        })
    }

    function po_content(id){
        $.post("./api/po_content.php",{id},(res)=>{
            $('.po_content').html(res);
        })
    }
</script>