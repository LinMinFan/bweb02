<style>
    .modal{
        position: absolute;
        height: 400px;
        width: 500px;
        left: 200px;
        top: 100px;
        overflow: auto;
        background: #000000aa;
        color:#fff;
        z-index: 10;
    }
</style>
<fieldset>
    <legend><p>目前位置：首頁><span >人氣文章</span></p></legend>

<table style="width:80%;margin:0 auto">
<tr>
    <td style="width:25%;">標題</td>
    <td style="width:50%;">內容</td>
    <td >人氣</td>
</tr>
<?php
$p=$_GET['p']??1;
$div=5;
$countns=$news->math('count','id',$sh);
$pages=ceil(($countns/$div));
$start=($p-1)*$div;
$pre=(($p-1)>0)?($p-1):1;
$next=(($p+1)<=$pages)?($p+1):$pages;
$nns=$news->all($sh,"ORDER BY `good` DESC limit $start,$div");
foreach ($nns as $key => $nn) {
?>
<tr>
    <td class="pop_title clo"><?=$nn['title'];?></td>
    <td class="pop_text">
        <span><?=mb_substr($nn['text'],0,10);?>...</span>
        <span class="modal" style="display:none;"><?=nl2br($nn['text']);?></span>
    </td>
    <td class="pop_good">
        <span><?=$nn['good'];?>個人說<img src="./icon/02B03.jpg" width="25px"></span>
        <?php
        if (isset($_SESSION['acc'])) {
            if ($log->math('count','id',['news'=>$nn['id'],'user'=>$_SESSION['acc']])>0) {
            ?>
            <span><a class="great" href="#" data-id="<?=$nn['id'];?>">-收回讚</a></span>
            <?php
            }else {
            ?>
            <span><a class="great" href="#" data-id="<?=$nn['id'];?>">-讚</a></span>
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
</fieldset>
<script>
    $(".pop_title").hover(function(){
        $(this).next().find('.modal').fadeToggle();
    })
    $(".pop_text").hover(function(){
        $(this).find('.modal').fadeToggle();
    })
  
   


    $('.great').on('click',function(){
        let text=$(this).text();
        let id =$(this).attr('data-id')
        $.post("./api/good.php",{text,id},()=>{
            location.reload();
        })
    })

</script>

