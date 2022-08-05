<?php
include_once "../base.php";
$id=$_GET['id'];

$posts=$news->find($id);

    echo $posts['text'];

