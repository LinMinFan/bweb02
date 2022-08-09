<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['parent'=>$_GET['id']]);
?>
<style>
    .result_box{
        width: 100%;
        height: 30px;
        position: relative;
    }
    .result_box div{
        width: var(--i);
        height: 30px;
        background: #ddd;
    }
    .result_box div span{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
<div>
    <span>
        目前位置：首頁>分類網誌><span class="menu_title">問卷調查><?=$subject['text'];?></span>
    </span>
</div>
<h3><?=$subject['text'];?></h3>
<div class="opts_box">
<table style="width:100%;">
<?php
foreach ($opts as $key => $opt) {
    ($subject['count']==0)?1:$subject['count'];
    $cent=round(($opt['count']/$subject['count']),2)*100;
?>
<tr>
    <td style="width:40%;"><?=$opt['text'];?></td>
    <td style="width:60%;">
    <div class="result_box">
        <div style="--i:<?=$cent;?>%">
            <span><?=$opt['count'];?>票(<?=$cent;?>%)</span>
        </div>
    </div>
    </td>
</tr>
<?php
}
?>
</table>
</div>



