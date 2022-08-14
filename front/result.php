<?php
$parent=$_GET['id'];
$subject=$que->find($parent);
$opts=$que->all(['parent'=>$parent])
?>
<style>
    .bg{
        height: 30px;
        background: #ccc;
        display:inline-block;
    }
    .cent{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<fieldset class="w80 mg">
    <legend>目前位置 : 首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
        
        <?php
            foreach ($opts as $key => $opt) {
                $s_c=(($subject['count'])==0)?1:$subject['count'];
                $cent=round(($opt['count']/$s_c),2)*100;
                ?>
                    <tr>
                        <td class="w45"><?=$opt['text'];?></td>
                        <td class="w45 pos_r">
                            <span class="bg" style="width:<?=$cent;?>%;"></span>
                            <span class="cent"><?=$opt['count'];?>票(<?=$cent;?>%)</span>
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


