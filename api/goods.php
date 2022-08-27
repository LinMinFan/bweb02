<?php
include "../base.php";
$data=$news->find($_POST['id']);
switch ($_POST['goods']) {
    case 1:
        $log->del(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data['goods']--;
        break;
    case 0:
        $log->save(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data['goods']++;
        break;
    
    default:
        
        break;
}

$news->save($data);
