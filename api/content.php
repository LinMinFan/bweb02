<?php
include "../base.php";

echo $news->find($_POST['id'])['text'];
?>

