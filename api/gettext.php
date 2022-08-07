<?php
include "../base.php";

$nns=$news->find($_GET['id']);

echo $nns['text'];