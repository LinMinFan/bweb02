<?php
include "../base.php";



$nn=$news->find(['id'=>$_POST['id']]);
?>

<span><?=$nn['text'];?></span>