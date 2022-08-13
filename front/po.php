<fieldset class="w80 mg flex">
    <legend>目前位置: 首頁 > 分類網誌 > <span class="po_title"></span></legend>
    <fieldset class="w25">
        <legend>分類網誌</legend>
        <div>
            <a class="blo" href="javascript:list('健康新知')">健康新知</a>
            <a class="blo" href="javascript:list('菸害防治')">菸害防治</a>
            <a class="blo" href="javascript:list('癌症防治')">癌症防治</a>
            <a class="blo" href="javascript:list('慢性病防治')">慢性病防治</a>
        </div>
    </fieldset>
    <fieldset class="w70">
        <legend>文章列表</legend>
        <div class="po_content">

        </div>
    </fieldset>
</fieldset>
<script>
    list('健康新知');
   function list(text){
    $('.po_title').text(text);
    $.post("./api/list.php",{text},(res)=>{
        $('.po_content').html(res);
    })
   }
   function news_text(id){
    $.post("./api/text.php",{id},(res)=>{
        $('.po_content').html(res);
    })
   }
</script>