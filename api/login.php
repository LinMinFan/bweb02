<?php
include "../base.php";
if ($user->math('count','id',$_POST)>0) {
    $_SESSION['acc']=$_POST['acc'];
    echo 0;
}else{
    if ($user->math('count','id',['acc'=>$_POST['acc']])>0) {
        echo 2;
    }else {
        echo 1;
    }
}