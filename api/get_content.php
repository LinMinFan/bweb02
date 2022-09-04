<?php
include "../base.php";

$content=$news->find($_POST['id'])['text'];
echo $content;
?>
