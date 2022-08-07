
    <form action="./api/edit_news.php" method="POST">
    <table style="width:80%;margin:0 auto;">
        <tr>
            <td style="width:10%;">編號</td>
            <td >標題</td>
            <td style="width:10%;">顯示</td>
            <td style="width:10%;">刪除</td>
        </tr>
        <?php
        $p=$_GET['p']??1;
        $div=3;
        $countns=$news->math('count','id');
        $pages=ceil(($countns/$div));
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $nns=$news->all(" limit $start,$div");
        foreach ($nns as $key => $nn) {
        ?>
        <tr>
            <td class="clo"><span><?=$key+1+$start;?>.</span></td>
            <td><?=$nn['title'];?></td>
            <td><input type="checkbox" name="sh[]" id="sh" value="<?=$nn['id'];?>" <?=($nn['sh']==1)?"checked":"";?>></td>
            <td><input type="checkbox" name="del[]" id="del" value="<?=$nn['id'];?>"></td>
            <input type="hidden" name="id[]" value="<?=$nn['id'];?>">
           
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
<div class="ct">
    <input type="submit" value="確定修改">
</div>
</form>
