<?php
$parent=$_GET['id'];
$subject=$que->find($parent);
$opts=$que->all(['parent'=>$parent]);
?>
<style>
    .res_bg{
        background: #ccc;
        height: 30px;
    }
    .res_cent{
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<fieldset class="w90">
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
        <?php
            foreach ($opts as $key => $opt) {
                $s_count=($subject['count']==0)?"1":$subject['count'];
                $cent=round(($opt['count']/$s_count),2)*100;
                ?>
                    <tr>
                        <td class="w40">
                            <?=$opt['text'];?>
                        </td>
                        <td class="w50 pos_r res_box">
                            <div class="res_bg" style="width:<?=$cent;?>%;"></div>
                            <div class="pos_a res_cent"><?=$opt['count'];?>票(<?=$cent;?>%)</div>
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

<script>

</script>