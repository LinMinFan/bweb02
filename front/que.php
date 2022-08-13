<fieldset class="w80 mg">
    <legend>目前位置: 首頁 > 問卷調查</legend>
    <table class="w100">
        <tr>
            <td class="w5">編號</td>
            <td class="w60">問卷題目</td>
            <td class="w5">投票總數</td>
            <td class="w5">結果</td>
            <td class="w5">狀態</td>
        </tr>
        <?php
         
         foreach ($que->all(['parent'=>0]) as $key => $data){
            ?>
                <tr>
                    <td class="w5 ct"><?=$key+1;?></td>
                    <td class="w60"><?=$data['text'];?></td>
                    <td class="w5"><?=$data['count'];?></td>
                    <td class="w5">
                        <a href="?do=result&id=<?=$data['id'];?>">結果</a>
                    </td>
                    <td class="w5">
                        <?php
                            if (isset($_SESSION['acc'])) {
                                ?>
                                    <a href="?do=vote&id=<?=$data['id'];?>">參與投票</a>
                                <?php
                            }else {
                                ?>
                                    <span>請先登入</span>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
            <?php
         }
        ?>
    </table>
    
</fieldset>
