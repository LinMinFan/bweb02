<?php
include "../base.php";

$data=['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']];

$user->save($data);
