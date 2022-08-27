<?php
include "../base.php";
$main=[];
$main['text']=$_POST['text'];
$main['parent']=0;
$main['total']=0;
${$_GET['do']}->save($main);
$id=${$_GET['do']}->find(['text'=>$_POST['text']])['id'];
foreach ($_POST['text2'] as $key => $text2) {
    $sub=[];
    $sub['text']=$text2;
    $sub['parent']=$id;
    $sub['total']=0;
    ${$_GET['do']}->save($sub);
}

to("../back.php?do={$_GET['do']}");
