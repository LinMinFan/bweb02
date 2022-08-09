<?php
include "../base.php";

$opt=$que->find($_POST['id']);
$subject=$que->find($_POST['parent']);

$opt['count']++;
$subject['count']++;
$que->save($opt);
$que->save($subject);