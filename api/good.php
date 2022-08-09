<?php
include "../base.php";
$data=$news->find($_POST['id']);
if ($_POST['text']=="讚") {
    $data['good']++;
    $log->save(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
}else {
    $data['good']--;
    $log->del(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
}
$news->save($data);