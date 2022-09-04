<?php
$id=$_GET['id'];
include "../base.php";
$main=$ques->find($id);
$sub=$ques->find($_POST['opt']);
$main['total']++;
$sub['total']++;
$ques->save($main);
$ques->save($sub);

to("../index.php?do=result&id={$id}");