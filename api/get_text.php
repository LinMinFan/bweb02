<?php
include "../base.php";

$id=$_POST['id'];

echo $news->find(['id'=>$id])['text'];

