<?php
include "../base.php";



$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

foreach ($news->all(['type'=>$array[$_POST['text']]]) as  $row) {
    ?>
        <p><a href="javascript:list_text(<?=$row['id'];?>)"><?=$row['title'];?></a></p>
    <?php
}