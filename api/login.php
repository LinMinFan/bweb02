<?php
include "../base.php";

if ($users->math('count','id',['acc'=>$_POST['acc']])>0) {
    if ($users->math('count','id',$_POST)>0) {
        $_SESSION['acc']=$_POST['acc'];
        echo 0;
    }else{
        echo 2;
    }
}else {
    echo 1;
}