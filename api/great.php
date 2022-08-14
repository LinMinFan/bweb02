<?php
include "../base.php";
$nn=$news->find($_POST['id']);

switch ($_POST['text']) {
    case '讚':
        $row=['user'=>$_SESSION['acc'],'news'=>$_POST['id']];
        $log->save($row);
        $nn['count']++;
        break;
    case '收回讚':
        $row=['user'=>$_SESSION['acc'],'news'=>$_POST['id']];
        $log->del($row);
        $nn['count']--;
        break;
    
    default:
        # code...
        break;
}
$news->save($nn);