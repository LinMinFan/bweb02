<?php
include "../base.php";

$chk_email=$user->math('count','id',['email'=>$_POST['email']]);

if ($chk_email>0) {
   $pw=$user->find(['email'=>$_POST['email']])['pw'];
   echo "您的密碼為：".$pw;
}else {
    echo "查無此資料";
}