<?php
include "../base.php";

$main=$que->find($_GET['id']);
$sub=$que->find($_POST['vote']);
$main['total']++;
$sub['total']++;
$que->save($main);
$que->save($sub);

to("../index.php?do=result&id={$_GET['id']}");