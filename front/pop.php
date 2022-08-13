<style>
    .news_text{
        position: relative;
    }
    .hidtext{
        position: absolute;
        top: 10px;
        left: -30px;
        width: 300px;
        height: 400px;
        color: #fff;
        background: #000000aa;
        overflow-y: scroll;
    }
</style>
<fieldset class="w90 mg_at">
    <legend>目前位置: 首頁 > 人氣文章區 </legend>
    <table class="w100">
        <tr>
            <td class="w30">標題</td>
            <td class="w45">內容</td>
            <td class="w25">人氣</td>
        </tr>
        <?php
            $p=$_GET['p']??1;
            $counts=$news->math('count','id',['sh'=>1]);
            $div=5;
            $pages=ceil(($counts/$div));
            $start=($p-1)*$div;
            $pre=(($p-1)>0)?($p-1):1;
            $next=(($p+1)<=$pages)?($p+1):$pages;
            $datas=$news->all("order by `count` desc limit $start,$div");
            foreach ($datas as $key => $data) {
                ?>
                    <tr>
                        <td class=" clo w30 news_title"><?=$data['title'];?></td>
                        <td class="w45 news_text">
                            <span><?=mb_substr($data['text'],0,10);?>...</span>
                            <span class="hidtext" style="display:none;"><?=$data['text'];?></span>
                        </td>
                        <td>
                            <?php
                                if (isset($_SESSION['acc'])) {
                                 $chk_log=$log->math('count','id',['user'=>$_SESSION['acc'],'news'=>$data['id']]);
                                 if ($chk_log > 0) {
                                    ?>
                                        <span><?=$data['count'];?>個人說<span class="good"></span>-</span>
                                        <a href="javascript:great('收回讚',<?=$data['id'];?>)">收回讚</a>
                                    <?php
                                 }else {
                                    ?>
                                        <span><?=$data['count'];?>個人說<span class="good"></span>-</span>
                                        <a href="javascript:great('讚',<?=$data['id'];?>)">讚</a>
                                    <?php
                                 }
                                }else {
                                    ?>
                                        <span><?=$data['count'];?>個人說<span class="good"></span></span>
                                    <?php
                                }
                            ?>
                        </td>
                    </tr>
                <?php
        }
        ?>
    </table>
    <div class="ct">
        <a href="?do=<?=$do;?>&p=<?=$pre;?>"><</a>
        <?php
            for ($i=1; $i <= $pages ; $i++) { 
                ?>
                    <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
                <?php
            }
        ?>
        <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>    
</fieldset>

<script>
    $('.news_title').hover(function(){
        //console.log($(this));
        $(this).next().children().toggle();
    })
    $('.news_text').hover(function(){
        //console.log($(this));
        $(this).children().toggle();
    })

    function great(good,id){
        $.post("./api/great.php",{good,id},()=>{
            location.reload();
        })
    }
</script>