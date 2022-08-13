<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['parent'=>$_GET['id']]);
?>
<style>
    .color{
        background: #ccc;
        height: 30px;
    }
    .r_box{
        position: relative;
    }
    .r_text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<fieldset class="w90 mg_at">
    <legend>目前位置: 首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
        <?php
            foreach ($opts as $key => $opt) {
                $s_cut=($subject['count']==0)?1:$subject['count'];
                $cent=round(($opt['count']/$s_cut),2)*100;
                ?>
                    <tr>
                        <td class="w45"><?=$opt['text'];?></td>
                        <td class="w45">
                            <div class="r_box w100">
                                    <div class="color" style="width:<?=$cent;?>%;"></div>
                                    <span class="r_text"><?=$opt['count'];?>票(<?=$cent;?>%)</span>
                            </div>
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

