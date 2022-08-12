<?php
include "../base.php";

$opt=$que->find($_POST['id']);
$opt['count']++;
$subject=$que->find(['id'=>$opt['parent']]);
$subject['count']++;
$que->save($opt);
$que->save($subject);