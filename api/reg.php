<?php
include "../base.php";

$chk_acc=$user->math('count','id',['acc'=>$_POST['acc']]);

if ($chk_acc>0) {
    echo "帳號重複";
}else {
    $data=['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']];
    $user->save($data);
    echo "註冊完成，歡迎加入";
}