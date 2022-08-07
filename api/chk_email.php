<?php
include "../base.php";

$chkemail=$user->math('count','id',['email'=>$_GET['email']]);


if ($chkemail>0) {
    $res=$user->find(['email'=>$_GET['email']]);
    echo "您的密碼為：".$res['pw'];
}else {
    echo "查無此資料";
}