<?php
$do=$_GET['do'];
include "../base.php";
$main=[];
$main['text']=$_POST['text'];
$main['parent']=0;
$main['total']=0;
$ques->save($main);
$id=$ques->find(['text'=>$_POST['text']])['id'];
$sub=[];
foreach ($_POST['opt'] as $key => $opt) {
    $sub['text']=$opt;
    $sub['parent']=$id;
    $sub['total']=0;
    $ques->save($sub);
}

to("../back.php?do={$do}");