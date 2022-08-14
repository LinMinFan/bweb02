<?php
include "../base.php";
$subject=$que->find($_POST['parent']);
$opt=$que->find($_POST['opt']);

$subject['count']++;
$opt['count']++;
$que->save($subject);
$que->save($opt);