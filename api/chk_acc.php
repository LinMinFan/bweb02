<?php
include "../base.php";

$chk_acc=$user->math('count','id',['acc'=>$_POST['acc']]);

if ($chk_acc>0) {
    echo 1;
}else {
    echo 0;
}

