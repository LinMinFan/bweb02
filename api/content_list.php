<?php
include "../base.php";

$nn=$news->find($_POST['id']);
?>
<p><?=$nn['text'];?></p>
