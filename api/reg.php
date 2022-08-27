<?php
include "../base.php";

if ($users->math('count','id',['acc'=>$_POST['acc']])>0) {
    echo "帳號重複";
}else{
    $users->save($_POST);
    echo "註冊完成，歡迎加入";
}