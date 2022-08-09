<style>
    .outsidebox{
        display: flex;
        width: 600px;
        margin: 0 auto;
    }
    .left_box{
        display: flex;
        flex-direction: column;
        margin: 10px auto;
    }
    .left_box a{
        display: block;
    }
</style>
<div>
    <span>
        目前位置：首頁>分類網誌><span class="menu_title">健康新知</span>
    </span>
</div>
<div class="outsidebox">
    <fieldset style="width:25%;">
        <legend>分類網誌</legend>
        <div class="left_box">
        <a class="lftmm" href="#">健康新知</a>
        <a class="lftmm" href="#">菸害防治</a>
        <a class="lftmm" href="#">癌症防治</a>
        <a class="lftmm" href="#">慢性病防治</a>
        </div>
    </fieldset>
    <fieldset style="width:75%;">
        <legend>文章列表</legend>
        <div class="right_box">

        </div>
    </fieldset>
</div>

<script>
    list("健康新知");

    $('.lftmm').on('click',function(){
        let text=$(this).text();
        $('.menu_title').text(text);
        list(text);
    })
    function list(text){
        $.get("./api/get_list.php",{text},(res)=>{
            $('.right_box').html(res);
        })
    }
    function text(id){
        $.get("./api/get_text.php",{id},(res)=>{
            console.log(res);
            $('.right_box').html(res);
        })
    }

</script>