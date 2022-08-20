<fieldset class="w80 mg">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?= $do; ?>" method="post">
    <table class="w100">
        <tr>
            <td class="w10">編號</td>
            <td class="w60">標題</td>
            <td class="w10">顯示</td>
            <td class="w10">刪除</td>
        </tr>
        <?php
            $p=$_GET['p']??1;
            $all_num=$$do->math('count','id');
            $div=3;
            $pages=ceil(($all_num/$div));
            $start=($p-1)*$div;
            $pre=(($p-1)>0)?($p-1):1;
            $next=(($p+1)<=$pages)?($p+1):$pages;
            $nns=$$do->all(" limit $start,$div");
            foreach ($nns as $key => $nn) {
                    ?>
                    <tr>
                        <td class="clo w10"><?=$key+1+$start;?></td>
                        <td class="w60"><?=$nn['title'];?></td>
                        <td class="w10">
                            <input type="checkbox" name="sh[]" value="<?=$nn['id'];?>" <?=($nn['sh']==1)?"checked":"";?>>
                        </td>
                        <td class="w10">
                            <input type="checkbox" name="del[]" value="<?=$nn['id'];?>">
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?=$nn['id'];?>">
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
    <div class="ct">
        <input type="submit" value="確定修改">
        <input type="reset" value="清空選取">
    </div>
    </form>
    
</fieldset>

<script>
   
</script>