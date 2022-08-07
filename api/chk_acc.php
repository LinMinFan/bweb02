<?php
include "../base.php";

$chkacc=$user->math('count','id',['acc'=>$_POST['acc']]);

if ($chkacc>0) {
    echo 1;
}else {
    echo 0;
}

