<?php
include "../base.php";

$chk=$user->math('count','id',['acc'=>$_POST['acc']]);

if ($chk>0) {
    echo 1;
}else{
    $data=['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']];
    $user->save($data);
    echo 0;
}