<?php
include "../base.php";
if ($user->math('count','id',$_POST)>0) {
       echo "您的密碼為：".$user->find($_POST)['pw'];
}else{
    echo "查無此資料";
}