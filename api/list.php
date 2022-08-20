<?php
include "../base.php";

$type=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

$nns=$news->all(['type'=>$type[$_POST['text']]]);

foreach ($nns as $key => $nn) {
    ?>
        <a href="javascript:po_content(<?=$nn['id'];?>)" class="blo"><?=$nn['title'];?></a>
    <?php
}