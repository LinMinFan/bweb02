<?php
include "../base.php";

switch ($_POST['text']) {
    case '讚':
        $data=['user'=>$_SESSION['acc'],'news'=>$_POST['id']];
        $log->save($data);
        $nn=$news->find($_POST['id']);
        $nn['count']++;
        break;
    case '收回讚':
        $log->del(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $nn=$news->find($_POST['id']);
        $nn['count']--;
        break;
    
    default:
        # code...
        break;
}

$news->save($nn);
