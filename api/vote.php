<?php
include "../base.php";

$subject=$que->find(['id'=>$_POST['parent']]);
$opt=$que->find(['id'=>$_POST['id']]);

$subject['count']++;
$opt['count']++;
$que->save($subject);
$que->save($opt);