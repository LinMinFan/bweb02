<?php
$qm=$que->find($_GET['id']);
?>
<style>
    .v_bg{
        background: #ccc;
        height: 30px;
    }
    .v_tt{
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
    }
</style>
<fieldset class="w80 mg ">
    <legend>目前位置：首頁 > 問卷調查 > <?=$qm['text'];?> </legend>
    <h3><?=$qm['text'];?></h3>
    <table class="w100">
<?php
$totalM=($qm['total']==0)?1:$qm['total'];
foreach ($que->all(['parent'=>$qm['id']]) as $key => $qs) {
    $cent=round($qs['total']/$totalM,2)*100;
    ?>
    <tr>
        <td class="w45"><?=$qs['text'];?></td>
        <td class="w45 pos_r">
            <div class="v_bg" style="width:<?=$cent;?>%;"></div>
            <div class="pos_a pos_ct v_tt"><?=$qs['total'];?>票(<?=$cent;?>%)</div>
        </td>
    </tr>
    <?php
}
?>
</table>
<div class="ct">
    <button onclick="ff('que')">返回</button>
</div>
</fieldset>
<script>

</script>