<style>
    .outside{
        width: 80%;
        display: flex;
        justify-content: center;
    }
    .block{
        display: block;
    }
    .flex{
        display: flex;
    }
    .flex_c{
        display: flex;
        justify-content: center;
    }
    .flex_a{
        display: flex;
        justify-content: space-around;
    }

    .w5{
        width: 5%;
    }
    .w10{
        width: 10%;
    }
    .w40{
        width: 40%;
    }
    .w50{
        width: 50%;
    }
    .w60{
        width: 60%;
    }
    .w70{
        width: 70%;
    }
    .w80{
        width: 80%;
    }
    .w90{
        width: 90%;
    }
    .w100{
        width: 100%;
    }

    .mg{
        margin: 0 auto;
    }

</style>
<div class="outside w100 mg">
<fieldset class="w100 mg">
    <legend>目前位置: 首頁 > 分類網誌 > <span id="title_text">健康新知</span></legend>
    <div class="innerbox flex">
        <fieldset class="w20">
            <legend>分類網誌</legend>
            <a class="block" href="javascript:title('健康新知')">健康新知</a>
            <a class="block" href="javascript:title('菸害防治')">菸害防治</a>
            <a class="block" href="javascript:title('癌症防治')">癌症防治</a>
            <a class="block" href="javascript:title('慢性病防治')">慢性病防治</a>
        </fieldset>
        <fieldset class="w80">
            <legend>文章列表</legend>
                <div id="article">

                </div>
        </fieldset>
    </div>
</fieldset>
</div>

<script>
    title("健康新知");
function title(title){
    $('#title_text').text(title);
    $.post("./api/get_title.php",{title},(res)=>{
        $('#article').html("");
        $('#article').append(res);
    })
}
function content(id){
    $.post("./api/get_text.php",{id},(res)=>{
        $('#article').html("");
        $('#article').append(res);
    })
}

</script>