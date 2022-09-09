<?php
include "../base.php";
foreach ($news->all(['type'=>$_POST['type']]) as $key => $nn) {
    ?>
    <div><a href="javascript:t_content(<?=$nn['id'];?>)"><?=$nn['title'];?></a></div>
    <?php
}