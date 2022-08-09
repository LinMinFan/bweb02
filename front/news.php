<style>
    .outsidebox{
        display: flex;
        margin: 0 auto;
        flex-wrap: wrap;
    }
    .outsidebox div{
        margin: 5px;
    }

</style>
<div>
    <span>
        目前位置：首頁>最新文章區
    </span>
</div>
<div class="outsidebox" style="width:100%;">
    <div style="width:25%;">標題</div><div style="width:50%;">內容</div><div style="width:20%;"></div>
    <?php
        $p=$_GET['p']??1;
        $countall=$$do->math('count','id',['sh'=>1]);
        $div=5;
        $pages=ceil($countall/$div);
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $nns = $$do->all(" limit $start,$div");
        foreach ($nns as $key => $nn) {
            ?>
            <div class="clo ct news_title" style="width:25%;"><?=$nn['title'];?></div>
            <div style="width:50%;">
            <span><?=mb_substr($nn['text'],0,10);?>...</span>
            <span style="display:none;"><?=$nn['text'];?></span>
            </div>
            <div class="news_good" style="width:20%;">
            <?php
                if ((isset($_SESSION['acc']))) {
                    if ($log->math('count','id',['user'=>$_SESSION['acc'],'news'=>$nn['id']]) > 0) {
                    ?>
                        <a class="goodlink" href="#" data-news="<?=$nn['id'];?>">收回讚</a>
                    <?php
                    }else {
                        ?>
                        <a class="goodlink" href="#" data-news="<?=$nn['id'];?>">讚</a>
                        <?php
                    }
                }
            ?>
            </div>
            <?php
            }
    ?>
</div>
<div class="ct">
        <a href="?do=news&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages ; $i++) { 
        ?>
            <a href="?do=news&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
        <?php
        }
        ?>
        <a href="?do=news&p=<?=$next;?>">></a>
</div>

<script>

$('.goodlink').on('click',function(){
    let text=$(this).text();
    let id=$(this).data('news');
    $.post("./api/good.php",{text,id},()=>{
        location.reload();
    })
})

$('.news_title').on('click',function(){
    $(this).next().children().toggle();
})

</script>