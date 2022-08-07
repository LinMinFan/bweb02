<fieldset>

<legend><p>目前位置：首頁><span>最新文章</span></p></legend>


<table style="width:80%;margin:0 auto">
<tr>
    <td style="width:25%;">標題</td>
    <td style="width:50%;">內容</td>
    <td ></td>
</tr>
<?php
$p=$_GET['p']??1;
$div=5;
$countns=$news->math('count','id',$sh);
$pages=ceil(($countns/$div));
$start=($p-1)*$div;
$pre=(($p-1)>0)?($p-1):1;
$next=(($p+1)<=$pages)?($p+1):$pages;
$nns=$news->all($sh," limit $start,$div");
foreach ($nns as $key => $nn) {
?>
<tr>
    <td class="news_title clo"><?=$nn['title'];?></td>
    <td class="news_text">
        <span><?=mb_substr($nn['text'],0,10);?>...</span>
        <span style="display:none;"><?=nl2br($nn['text']);?></span>
    </td>
    <td class="news_good">
        <span><?=$nn['good'];?>個人說<img src="./icon/02B03.jpg" width="25px"></span>
        <?php
        if (isset($_SESSION['acc'])) {
            if ($log->math('count','id',['news'=>$nn['id'],'user'=>$_SESSION['acc']])>0) {
            ?>
            <span><a class="great" href="#" data-id="<?=$nn['id'];?>">收回讚</a></span>
            <?php
            }else {
            ?>
            <span><a class="great" href="#" data-id="<?=$nn['id'];?>">讚</a></span>
            <?php
            }
        }
        ?>
    </td>
</tr>
<?php
}
?>
</table>
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
</fieldset>
<script>
    $('.news_title').on('click',function(){
        $(this).next().children().toggle();
    })


    $('.great').on('click',function(){
        let text=$(this).text();
        let id =$(this).attr('data-id')
        $.post("./api/good.php",{text,id},()=>{
            location.reload();
        })
    })
</script>

