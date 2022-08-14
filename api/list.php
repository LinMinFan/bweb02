<?php
include "../base.php";

$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

$lists=$news->all(['type'=>$array[$_POST['text']]]);

foreach ($lists as $key => $list) {
    ?>
        <p><a href="javascript:content(<?=$list['id'];?>)"><?=$list['title'];?></a></p>
    <?php
}