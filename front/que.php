<fieldset class="w80 mg ">
    <legend>目前位置：首頁 > 問卷調查 </legend>
<table class="w100">
<tr>
    <td class="w5">編號</td>
    <td class="w60">問卷題目</td>
    <td class="w10">投票總數</td>
    <td class="w5">結果</td>
    <td class="10">狀態</td>
</tr>
<?php
foreach ($que->all(['parent'=>0]) as $key => $qm) {
?>
<tr>
    <td class="w5"><?=$key+1;?></td>
    <td class="w60"><?=$qm['text'];?></td>
    <td class="w10"><?=$qm['total'];?></td>
    <td class="w5">
        <a href="?do=result&id=<?=$qm['id'];?>">結果</a>
    </td>
    <td class="10">
        <?php
        if (!isset($_SESSION['acc'])) {
            echo "請先登入";
        }else {
            ?>
            <a href="?do=vote&id=<?=$qm['id'];?>">參與投票</a>
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