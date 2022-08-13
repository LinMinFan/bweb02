<?php
include "../base.php";

$chk_acc=$user->math('count','id',['acc'=>$_POST['acc']]);
if ($chk_acc>0) {
    $chk_pw=$user->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
    if ($chk_pw>0) {
        $_SESSION['acc']=$_POST['acc'];
        echo 3;
    }else{
        echo 1;
    }
}else {
    echo 0;
}

