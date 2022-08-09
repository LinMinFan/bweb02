<?php
include "../base.php";

$chk=$user->math('count','id',['email'=>$_GET['email']]);

if ($chk>0) {
    echo "您的密碼為：".$user->find(['email'=>$_GET['email']])['pw'];
}else {
    echo "查無此資料";
}
