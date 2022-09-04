<fieldset class="w90 mg">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
    <table class="w100">
        <tr>
            <td class="w10 ct">編號</td>
            <td class="w50 ct">標題</td>
            <td class="w10 ct">顯示</td>
            <td class="w10 ct">刪除</td>
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
                <td class="w10 ct clo"><?=$start+$key+1;?>.</td>
                <td class="w50 ct"><?=$nn['title'];?></td>
                <td class="w10 ct">
                    <input type="checkbox" name="sh[]" value="<?=$nn['id'];?>" <?=($nn['sh']==1)?"checked":"";?>>
                    <input type="hidden" name="id[]" value="<?=$nn['id'];?>">
                </td>
                <td class="w10 ct">
                    <input type="checkbox" name="del[]" value="<?=$nn['id'];?>">
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
            <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($p==$i)?"class='fs24'":"";?>><?=$i;?></a>
            <?php
        }
        ?>
        <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
</fieldset>
<script>
   
</script>