<fieldset class="w80 mg">
    <legend>目前位置：首頁 > 分類網誌 > <span class="po_title"></span></legend>
    <div class="w100 flex flex_ja flex_ac">
        <fieldset class="w30">
            <legend>分類網誌</legend>
            <a href="javascript:get_list('健康新知',1)" class="blo">健康新知</a>
            <a href="javascript:get_list('菸害防治',2)" class="blo">菸害防治</a>
            <a href="javascript:get_list('癌症防治',3)" class="blo">癌症防治</a>
            <a href="javascript:get_list('慢性病防治',4)" class="blo">慢性病防治</a>
        </fieldset>
        <fieldset class="w60">
            <legend>文章列表</legend>
            <div class="po_content">

            </div>
        </fieldset>
    </div>
</fieldset>
<script>
    get_list('健康新知',1);
    function get_list(text,type){
        $('.po_title').text(text);
        $.post("./api/get_list.php",{text,type},(res)=>{
            $('.po_content').html(res);
        })
    }
    function get_content(id){
        $.post("./api/get_content.php",{id},(res)=>{
            $('.po_content').html(res);
        })
    }
</script>