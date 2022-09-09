<fieldset class="w80 mg flex">
    <legend>目前位置：首頁 > 分類網誌 > <span class="tt"></span></legend>
    <fieldset class="w30">
        <legend>分類網誌</legend>
        <a href="javascript:t_list(1)" class="blo">健康新知</a>
        <a href="javascript:t_list(2)" class="blo">菸害防治</a>
        <a href="javascript:t_list(3)" class="blo">癌症防治</a>
        <a href="javascript:t_list(4)" class="blo">慢性病防治</a>
    </fieldset>
    <fieldset class="w60">
        <legend>文章列表</legend>
        <div class="tc">

        </div>
    </fieldset>

</fieldset>
<script>
    t_list(1);
    function t_list(type){
        let text;
        switch (type) {
            case 1:
                text="健康新知";
                break;
            case 2:
                text="菸害防治";
                break;
            case 3:
                text="癌症防治";
                break;
            case 4:
                text="慢性病防治";
                break;
        
            default:
                break;
        }
        $('.tt').text(text);
        $('.tc').load("./api/t_list.php",{type},()=>{

        })
    }
    function t_content(id){
        $('.tc').load("./api/t_content.php",{id},()=>{

        })
    }
</script>