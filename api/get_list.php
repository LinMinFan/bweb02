<?php
include "../base.php";

$titles=$news->all(['type'=>$_POST['type']]);
foreach ($titles as $key => $tt) {
    ?>
      <div><a href="javascript:get_content(<?=$tt['id'];?>)"><?=$tt['title'];?></a></div>  
    <?php
}