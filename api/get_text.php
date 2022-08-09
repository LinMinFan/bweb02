<?php
include "../base.php";


$data=$news->find($_GET['id']);
echo $data['text'];
