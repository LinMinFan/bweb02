<style>
    .opt_box{
        position: relative;
    }
    .bkg{
        height: 30px;
        background: #ccc;
        margin-left: 20px;
    }
    .opt_text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<?php
$subject = $que->find(['id' => $_GET['id']]);
?>

<div class="w100">
    <fieldset class="w100 mg">
        <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
        <h3><?=$subject['text'];?></h3>
        <table class="w100">
            <?php
            $opts = $que->all(['parent' => $_GET['id']]);
            foreach ($opts as $key => $opt) {
                $sbc=($subject['count']==0)?1:$subject['count'];
                $cent=round($opt['count']/$sbc,2)*100;
            ?>
                <tr>
                    <td class="w100 flex flex_ac">
                        <div class="w50">
                        <span><?=$opt['text'];?></span>
                        </div>
                        <div class="w45 opt_box">
                            <div class="bkg" style="width:<?=$cent;?>%;">
                            </div>
                            <span class="opt_text"><?=$opt['count'];?>票(<?=$cent;?>%)</span>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
    </fieldset>
</div>

<script>
 
</script>