<?php
$id=$_GET['id'];
$main=$ques->find($id);
?>
<style>
  .bg{
    background: #ccc;
  }
  .st{
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }
</style>
<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 問卷調查 > <?=$main['text'];?></legend>
    <div class="w100 flex flex_w flex_ac">
    <?php
    foreach ($ques->all(['parent'=>$id]) as $key => $sub) {
        $mt=($main['total']==0)?1:$main['total'];
        $cent=round($sub['total']/$mt,2)*100;
        ?>
        <div class="w45">
            <?=$sub['text'];?>
        </div>
        <div class="w45 pos_r">
            <div class="bg" style="width: <?=$cent;?>%;height:30px"></div>
            <span class="pos_a pos_ct st"><?=$sub['total'];?>票(<?=$cent;?>%)</span>
        </div>
        <?php
    }
    ?>
    </div>
    <div class="ct">
        <button onclick="front('ques')">返回</button>
    </div>
</fieldset>
<script>

</script>