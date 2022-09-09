<?php
include "../base.php";
?>
<div><pre><?=$news->find($_POST['id'])['text'];?></pre></div>
 