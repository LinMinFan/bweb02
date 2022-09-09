<?php
$qm=$que->find($_GET['id']);
?>
<fieldset class="w80 mg ">
    <legend>目前位置：首頁 > 問卷調查 > <?=$qm['text'];?> </legend>
    <h3><?=$qm['text'];?></h3>
<?php
foreach ($que->all(['parent'=>$qm['id']]) as $key => $qs) {
    ?>
    <div>
        <input type="radio" name="vote" id="" value="<?=$qs['id'];?>">
        <?=$qs['text'];?>
    </div>
    <?php
}
?>
<div class="ct">
    <button onclick="vote(<?=$qm['id'];?>,$('input:checked').val())">我要投票</button>
</div>
</fieldset>
<script>
function vote(qm,qs){
    $.post("./api/vote.php",{qm,qs},()=>{
        ff('result&id='+qm);
    })
}
</script>