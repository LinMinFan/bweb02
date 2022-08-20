<?php
include "../base.php";

$chk_email=$users->math('count','id',['email'=>$_POST['email']]);

if ($chk_email>0) {
    $pw=$users->find(['email'=>$_POST['email']])['pw'];
    echo "您的密碼為：".$pw;
}else {
    echo "查無此資料";
}