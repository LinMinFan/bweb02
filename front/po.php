<fieldset class="w100">
    <legend>目前位置：首頁 > 分類網誌 > <span class="po_title"></span></legend>
    <div class="w80 flex">
    <fieldset class="w20">
        <legend>分類網誌</legend>
        <a href="javascript:title_list('健康新知')" class="blo">健康新知</a>
        <a href="javascript:title_list('菸害防治')" class="blo">菸害防治</a>
        <a href="javascript:title_list('癌症防治')" class="blo">癌症防治</a>
        <a href="javascript:title_list('慢性病防治')" class="blo">慢性病防治</a>
    </fieldset>
    <fieldset class="w70">
        <legend>文章列表</legend>
        <div class="po_content">

        </div>
    </fieldset>
    </div>
</fieldset>

<script>
title_list('健康新知');
function title_list(text){
    $('.po_title').text(text);
    $.post("./api/po_content.php",{text},(res)=>{
        $('.po_content').html(res);
    })
}
function content_list(id){
    $.post("./api/content_list.php",{id},(res)=>{
        $('.po_content').html(res);
    })
}
</script>