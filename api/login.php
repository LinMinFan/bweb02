<?php
include "../base.php";

$chk_acc=$user->math('count','id',['acc'=>$_POST['acc']]);
$chk_pw=$user->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if ($chk_acc>0) {
    if ($chk_pw>0) {
        $_SESSION['acc']=$_POST['acc'];
    }else {
        echo "2";
    }
}else {
    echo "1";
}