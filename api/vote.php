<?php
include "../base.php";

$subject=$que->find($_POST['parent']);
$opt=$que->find($_POST['id']);

$subject['count']++;
$opt['count']++;
$que->save($subject);
$que->save($opt);