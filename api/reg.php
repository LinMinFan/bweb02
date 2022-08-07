<?php
include "../base.php";

$chkacc=$user->math('count','id',['acc'=>$_POST['acc']]);

if ($chkacc>0) {
    echo "帳號重複";
}else {
    $data=['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']];
    $user->save($data);
    echo "歡迎加入";
}
