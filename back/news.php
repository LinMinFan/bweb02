<div class="w100">
    <fieldset class="w80 mg">
        <legend>帳號管理</legend>
        <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="w100">
            <tr>
                <td class="w10 ct">編號</td>
                <td class="w70 ct">標題</td>
                <td class="w10 ct">顯示</td>
                <td class="w10 ct">刪除</td>
            </tr>
            <?php
                $p=$_GET['p']??1;
                $counts=$$do->math('count','id');
                $div=3;
                $pages=ceil(($counts/$div));
                $start=($p-1)*$div;
                $pre=(($p-1)>0)?($p-1):1;
                $next=(($p+1)<=$pages)?($p+1):$pages;
                $datas=$$do->all(" limit $start,$div");
                foreach ($datas as $key => $data) {
                        ?>
                            <tr>
                                <td class="clo w10 ct"><?=$key+1+$start;?>.</td>
                                <td class="w70 ct"><?=$data['title'];?></td>
                                <td class="w10 ct"><input type="checkbox" name="sh[]" value="<?=$data['id'];?>" <?=($data['sh']==1)?"checked":"";?>></td>
                                <td class="w10 ct"><input type="checkbox" name="del[]" value="<?=$data['id'];?>"></td>
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
                        <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"class='bft'":"";?>><?=$i;?></a>
                    <?php
                    }
                ?>
            <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>

        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
        </form>

        

