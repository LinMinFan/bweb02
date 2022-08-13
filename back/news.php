<fieldset class="w70 mg">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
    <table class="w100">
        <tr>
            <td class="w10">編號</td>
            <td class="w70">標題</td>
            <td class="w10">顯示</td>
            <td class="w10">刪除</td>
        </tr>
        <?php
            $p=$_GET['p']??1;
            $counts=$news->math('count','id');
            $div=3;
            $start=($p-1)*$div;
            $pages=ceil(($counts/$div));
            $pre=(($p-1)>0)?($p-1):1;
            $next=(($p+1)<=$pages)?($p+1):$pages;
            foreach ($news->all(" limit $start,$div") as $key => $data) {
                    ?>
                        <tr>
                            <td class="w10 clo ct"><?=$key+1+$start;?>.</td>
                            <td class="w70"><?=$data['title'];?></td>
                            <td class="w10 ct">
                                <input type="checkbox" name="sh[]" value="<?=$data['id'];?>" <?=($data['sh']==1)?"checked":"";?>>
                            </td>
                            <td class="w10 ct">
                                <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                            </td>
                            <input type="hidden" name="id[]" value="<?=$data['id'];?>">
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
                        <a href="?do=<?=$do;?>&p=<?=$i;?>"<?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
                    <?php
                }
            ?>
            <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
    </form>
    