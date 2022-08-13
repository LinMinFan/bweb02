<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['parent'=>$_GET['id']]);
?>
<style>
    .res_box{
        position: relative;
    }
    .bg{
        height: 30px;
    }
    .res_text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<fieldset class="w80 mg">
    <legend>目前位置: 首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
       
        <?php
         
         foreach ($opts as $key => $opt){
            $s_count=($subject['count']==0)?1:$subject['count'];
            $cent=round(($opt['count']/$s_count),2)*100;
            ?>
                <tr>
                    <td class="w60">
                        <?=$opt['text'];?>
                    </td>
                    <td class="w40 res_box">
                        <div class="bg" style="width: <?=$cent;?>%;"></div>
                        <span class="res_text"><?=$opt['count'];?>票(<?=$cent;?>%)</span>
                    </td>
                </tr>
            <?php
         }
        ?>
    </table>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>
</fieldset>