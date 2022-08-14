<?php
include "../base.php";

$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

foreach ($news->all(['type'=>$array[$_POST['text']]]) as $key => $row) {
    ?>
        <p>
            <a href="javascript:content(<?=$row['id'];?>)"><?=$row['title'];?></a>
        </p>
    <?php
}