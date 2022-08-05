<?php
include "../base.php";

$opt=$_POST['opt'];
$option=$que->find($opt);
$option['count']++;
$que->save($option);

$subject=$que->find($option['subject_id']);
$subject['count']++;
$que->save($subject);

to("../index.php?do=result&id=".$subject['id']);