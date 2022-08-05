<style>
    .type{
        cursor: pointer;
        color: #0000ff;
        margin: 10px 0;
    }
    .typebox{
        display: flex;
        flex-wrap: wrap;
        width: 90px;
    }

    .type:hover{
        border-bottom:1px solid #0000ff;
    }
</style>
<div>目前位置：首頁>分類網誌><span id="header">健康新知</span></div>
<div style="display:flex;">
<fieldset >
    <legend>分類網誌</legend>
    <div class="typebox" >
    <span class="type">健康新知</span>
    <span class="type">菸害防制</span>
    <span class="type">癌症防治</span>
    <span class="type">慢性病防治</span>
    </div>
</fieldset>
<fieldset >
    <legend>文章列表</legend>
    <div id="arttext"></div>
</fieldset>
</div>

<script>
getlist("健康新知");

$('.type').on('click',function(){
    let type=$(this).html();
    $('#header').html(type);
    getlist(type);

})

function getlist(type){
    $.get('./api/get_list.php',{type},(list)=>{
        $('#arttext').html(list);
    })
}

function getnews(id){
    $.get("./api/get_news.php",{id},(news)=>{
        $("#arttext").html(news);
    })
}

</script>