<style>
    .outsidebox{
        display: flex;
        margin: 0 auto;
        flex-wrap: wrap;
    }
    .outsidebox div{
        margin: 5px;
    }
    .news_title+div{
        position: relative;
    }
    .sub_text{
        position: absolute;
        top: 0;
        left: -40px;
        background: #0000009a;
        color: #fff;
        height: 400px;
        overflow: auto;
        z-index: 10;
    }

</style>
<div>
    <span>
        目前位置：首頁>人氣文章區
    </span>
</div>
<div class="outsidebox" style="width:100%;">
    <div style="width:25%;">標題</div><div style="width:50%;">內容</div><div style="width:20%;">人氣</div>
    <?php
        $p=$_GET['p']??1;
        $countall=$news->math('count','id',['sh'=>1]);
        $div=5;
        $pages=ceil($countall/$div);
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $nns = $news->all(" ORDER BY `good` DESC limit $start,$div");
        foreach ($nns as $key => $nn) {
            ?>
            <div class="clo ct news_title" style="width:25%;"><?=$nn['title'];?></div>
            <div style="width:50%;">
            <span><?=mb_substr($nn['text'],0,10);?>...</span>
            <span class="sub_text" style="display:none;"><?=$nn['text'];?></span>
            </div>
            <div class="news_good" style="width:20%;">
            <span><?=$nn['good'];?>個人說<img src="./icon/02B03.jpg" width="15px">-</span>
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
        <a href="?do=pop&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages ; $i++) { 
        ?>
            <a href="?do=pop&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
        <?php
        }
        ?>
        <a href="?do=pop&p=<?=$next;?>">></a>
</div>

<script>

$('.goodlink').on('click',function(){
    let text=$(this).text();
    let id=$(this).data('news');
    $.post("./api/good.php",{text,id},()=>{
        location.reload();
    })
})

$('.news_title').on('mouseenter',function(){
    $(this).next().find('.sub_text').toggle();
})
$('.news_title').on('mouseout',function(){
    $(this).next().find('.sub_text').toggle();
})
$('sub_text').on('mouseenter',function(){
    $(this).toggle();
})
$('.sub_text').on('mouseout',function(){
    $(this).toggle();
})

</script>