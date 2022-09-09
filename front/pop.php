<style>
    .all_ct{
        width: 300px;
        height: 400px;
        overflow-y: scroll;
        background: #000000aa;
        color: #fff;
        top:10px;
        left: -15px;
    }
</style>
<fieldset class="w80 mg ">
    <legend>目前位置：首頁 > 最新文章區 </legend>
<table class="w100">
    <tr>
        <td class="w35">標題</td>
        <td class="w35">內容</td>
        <td class=""></td>
    </tr>
    <?php
    $p=$_GET['p']??1;
    $countN=$news->math('count','id',$sh);
    $div=5;
    $pages=ceil($countN/$div);
    $start=($p-1)*$div;
    $pre=($p-1>0)?$p-1:1;
    $next=($p+1<=$pages)?$p+1:$pages;
    foreach ($news->all($sh," order by `goods` desc limit $start,$div") as $key => $nn) {
    ?>
    <tr>
        <td class="w35 clo ntt"><?=$nn['title'];?></td>
        <td class="w35 pos_r">
            <span><?=mb_substr($nn['text'],0,10);?>...</span>
            <span class="dpn pos_a all_ct"><?=$nn['text'];?></span>
        </td>
        <td class="">
            <?php
            if (isset($_SESSION['acc'])) {
                if ($log->math('count','id',['acc'=>$_SESSION['acc'],'news'=>$nn['id']])>0) {
                    ?>
                    <span><?=$nn['goods'];?>個人說 <span class="good"></span>-</span>
                    <a href="javascript:goods(<?=$nn['id'];?>,0)">收回讚</a>
                    <?php
                }else{
                    ?>
                    <span><?=$nn['goods'];?>個人說 <span class="good"></span>-</span>
                    <a href="javascript:goods(<?=$nn['id'];?>,1)">讚</a>
                    <?php
                }
            }else{
                ?>
                <span><?=$nn['goods'];?>個人說 <span class="good"></span></span>
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
    for ($i=1; $i <= $pages; $i++) { 
        ?>
    <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"class='fs20'":"";?>><?=$i;?></a>
        <?php
    }
    ?>
    <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
</div>
</fieldset>
<script>
    $('.ntt').hover(function(){
        $(this).next().children().toggle();
    })
    $('.all_ct').hover(function(){
        $(this).toggle();
    })

    function goods(id,goods){
        $.post("./api/goods.php",{id,goods},()=>{
            ff('news');
        })
    }
</script>