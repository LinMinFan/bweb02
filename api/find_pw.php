<?php
include "../base.php";

if ($users->math('count','id',$_POST)>0) {
    echo "您的密碼為：".$users->find($_POST)['pw'];
}else{
    echo "查無此資料";
}