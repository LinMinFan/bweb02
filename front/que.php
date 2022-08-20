<fieldset class="w90">
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table class="w100">
    <tr>
        <td class="w5">編號</td>
        <td class="w70">問卷題目</td>
        <td class="w5">投票總數</td>
        <td class="w5">結果</td>
        <td class="w5">狀態</td>
    </tr>
    <?php
    $qqs=$que->all(['parent'=>0]);
    foreach ($qqs as $key => $qq) {
        ?>
            <tr>
                <td class="w5 ct"><?=$key+1;?>.</td>
                <td class="w80"><?=$qq['text'];?></td>
                <td class="w5 ct"><?=$qq['count'];?></td>
                <td class="w5">
                    <a href="?do=result&id=<?=$qq['id'];?>">結果</a>
                </td>
                <td class="w5">
                    <?php
                        if (isset($_SESSION['acc'])) {
                            ?>
                                <a href="?do=vote&id=<?=$qq['id'];?>">參與投票</a>
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