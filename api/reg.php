<?php
include "../base.php";

$chk_acc=$users->math('count','id',['acc'=>$_POST['acc']]);

if ($chk_acc>0) {
    echo "帳號重複";
}else{
    $users->save($_POST);
    echo "註冊完成，歡迎加入";
}