<?php
include "../base.php";

$opt=$que->find($_POST['id']);
$subject=$que->find(['id'=>$opt['parent']]);
$opt['count']++;
$subject['count']++;
$que->save($opt);
$que->save($subject);
echo $subject['id'];