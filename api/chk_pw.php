<?php
include "../base.php";

$chk=$user->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if ($chk>0) {
    echo 1;
    $_SESSION['acc']=$_POST['acc'];
}else {
    echo 0;
}
