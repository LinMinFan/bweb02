<?php
include "../base.php";

$parent=$que->find($_POST['parent']);
$opt=$que->find($_POST['opt']);
$parent['count']++;
$opt['count']++;

$que->save($parent);
$que->save($opt);