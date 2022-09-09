<fieldset class="w60 mg">
    <legend>最新文章管理</legend>
    <form action="./api/save.php?do=<?=$do;?>" method="post">
<table class="w100">
    <tr>
        <td class="ct w10">編號</td>
        <td class="ct w50">標題</td>
        <td class="ct w10">顯示</td>
        <td class="ct w10">刪除</td>
    </tr>
    <?php
    $p=$_GET['p']??1;
    $countN=$news->math('count','id');
    $div=3;
    $pages=ceil($countN/$div);
    $start=($p-1)*$div;
    $pre=($p-1>0)?$p-1:1;
    $next=($p+1<=$pages)?$p+1:$pages;
    foreach ($news->all(" limit $start,$div") as $key => $nn) {
        ?>
        <tr>
            <td class="ct clo w10"><?=$key+$start+1;?></td>
            <td class="ct w50"><?=$nn['title'];?></td>
            <td class="ct w10">
                <input type="checkbox" name="sh[]" value="<?=$nn['id'];?>" <?=($nn['sh']==1)?"checked":"";?>>
            </td>
            <td class="ct w10">
                <input type="checkbox" name="del[]" value="<?=$nn['id'];?>">
                <input type="hidden" name="id[]" value="<?=$nn['id'];?>">
            </td>
        </tr>
        <?php
        }
        ?>
</table>
<div class="ct">
    <input type="submit" value="確定修改">
</div>
</form>
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

