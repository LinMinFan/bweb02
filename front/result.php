<?php
$subject=$que->find($_GET['id']);
$parent=$subject['id'];
$opts=$que->all(['parent'=>$parent]);
?>
<style>
    .res_text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<fieldset class="w80 mg">
    <legend>「目前位置: 首頁 > 問卷調查 > <?=$subject['text'];?> </legend>
    <h3><?=$subject['text'];?></h3>
    <div class="w100 flex" style="flex-wrap:wrap;">
        <?php
            foreach ($opts as $key => $opt) {
                $s_ct=($subject['count']==0)?1:$subject['count'];
                $cent=round(($opt['count']/$s_ct),2)*100;
                ?>
                <div class="w45"><span><?=$opt['text'];?></span></div>
                <div class="w45 pos_r flex flex_ac flex_js">
                    <div class="res_box bg" style="width:<?=$cent;?>%;height:30px"></div>
                    <span class="res_text"><?=$opt['count'];?>票(<?=$cent;?>%)</span>
                </div>
                <?php
            }
        ?>
        </div>
        <div class="ct">
            <button onclick="location.href='?do=que'">返回</button>
        </div>

</fieldset>

<script>
   function vote(id,parent){
        $.post("./api/vote.php",{id,parent},()=>{
            location.href="?do=result&id="+parent;
        })
   }

</script>