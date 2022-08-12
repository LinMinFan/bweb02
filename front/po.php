<div class="w100">
    <fieldset class="w80 mg">
        <legend>目前位置：首頁 > 分類網誌 > <span class="po_title"></span></legend>
        <div class="w100 flex">
            <fieldset class="w30">
                <legend>分類網誌</legend>
                <a class="blo" href="javascript:text('健康新知')">健康新知</a>
                <a class="blo" href="javascript:text('菸害防治')">菸害防治</a>
                <a class="blo" href="javascript:text('癌症防治')">癌症防治</a>
                <a class="blo" href="javascript:text('慢性病防治')">慢性病防治</a>
            </fieldset>
            <fieldset class="w70">
                <legend>文章列表</legend>
                <div class="po_content">

                </div>
            </fieldset>
        </div>
    </fieldset>
</div>

<script>
    text("健康新知");
function text(text){
    $('.po_title').html(text);
    $.post("./api/get_title.php",{text},(res)=>{
        $('.po_content').html(res);
    })
}
function content(id){
    $.post("./api/get_content.php",{id},(res)=>{
        $('.po_content').html(res);
    })
}

</script>