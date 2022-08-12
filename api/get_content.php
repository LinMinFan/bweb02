<?php
include "../base.php";


$nn=$news->find(['id'=>$_POST['id']]);
    ?>
    <p><?=$nn['text'];?></p>
    <?php
