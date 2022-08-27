<?php
$main=$que->find($_GET['id']);
?>
<style>
    .bg{
        background: #ddd;
    }

</style>
<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 問卷調查 > <?=$main['text'];?></legend>
        <?php
            foreach ($que->all(['parent'=>$main['id']]) as $key => $sub) {
                $dnm=($main['total']==0)?1:$main['total'];
                $cent=round(($sub['total']/$dnm),2)*100;
                ?>
                <table class="w100">
                    <tr>
                        <td class="w45"><?=$sub['text'];?></td>
                        <td class="w45 pos_r">
                            <div class="bg" style="height:30px; width:<?=$cent;?>%"></div>
                            <span class="pos_a pos_ct">
                                <?=$sub['total']?>票(<?=$cent;?>%)
                            </span>
                        </td>
                    </tr>
                </table>
                <?php
            }
        ?>
        <div class="ct">
            <button onclick="location.href='?do=que'">返回</button>
        </div>
    
</fieldset>

