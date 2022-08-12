<?php
include "../base.php";

$chk=$user->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if ($chk>0) {
    $_SESSION['acc']=$_POST['acc'];
    echo 1;
}else {
    echo 0;
}