<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table class="w100">
        <tr>
            <td class="w5 ct">編號</td>
            <td class="w70">問卷題目</td>
            <td class="w10 ct">投票總數</td>
            <td class="w5 ct">結果</td>
            <td class="w10 ct">狀態</td>
        </tr>
        <?php
        foreach ($ques->all(['parent'=>0]) as $key => $qf) {
            ?>
            <tr>
                <td class="w5 ct"><?=$key+1;?></td>
                <td class="w70"><?=$qf['text'];?></td>
                <td class="w10 ct"><?=$qf['total'];?></td>
                <td class="w5 ct">
                    <a href="?do=result&id=<?=$qf['id'];?>">結果</a>
                </td>
                <td class="w10">
                    <?php
                    if (!isset($_SESSION['acc'])) {
                        ?>
                        <span>請先登入</span>
                        <?php
                    }else{
                        ?>
                        <a href="?do=vote&id=<?=$qf['id'];?>">參與投票</a>
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
<script>

</script>