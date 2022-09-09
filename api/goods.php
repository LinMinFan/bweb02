<?php
include "../base.php";
$data=$news->find($_POST['id']);
switch ($_POST['goods']) {
    case 0:
        $log->del(['acc'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data['goods']--;
        break;
    case 1:
        $log->save(['acc'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data['goods']++;
        break;
    
    default:
        
        break;
}
$news->save($data);