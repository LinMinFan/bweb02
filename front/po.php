<fieldset>
    <legend><p>目前位置：首頁>分類網誌><span id="po_title">健康新知</span></p></legend>

<div style="display:flex;justify-content: center;">
<div class="po_left" style="width:20%;">
<fieldset>
    <legend>分類網誌</legend>
    <a href="#" class="type">健康新知</a>
    <a href="#" class="type">菸害防治</a>
    <a href="#" class="type">癌症防治</a>
    <a href="#" class="type">慢性病防治</a>
</fieldset>
</div>
<div class="po_right" style="width:50%;">
    <fieldset>
        <legend>文章列表</legend>
        <div id="po_content">

        </div>
    </fieldset>
</div>
</div>
</fieldset>
<script>
    getlist('健康新知');

    let menu=$('.type');
    menu.click(function(){
        let type=$(this).html();
        $('#po_title').html(type);
        getlist(type);
    })

    function getlist(type){
        $.get("./api/getlist.php",{type},(res)=>{
            $('#po_content').html(res);
        })
    }
   
   function gettext(id){
    $.get("./api/gettext.php",{id},(res)=>{
            $('#po_content').html(res);
        })
   }
</script>