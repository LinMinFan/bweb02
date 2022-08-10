<?php
include "../base.php";

$chk=$user->math('count','id',['acc'=>$_POST['acc']]);

if ($chk>0) {
    echo 1;
}else{
    echo 0;
}