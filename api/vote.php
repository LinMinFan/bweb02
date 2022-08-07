<?php
include "../base.php";

$opt=$que->find($_POST['opt']);
$subject=$que->find($opt['subject_id']);

$opt['count']++;
$subject['count']++;
$que->save($opt);
$que->save($subject);
to("../index.php?do=result&id=".$subject['id']);