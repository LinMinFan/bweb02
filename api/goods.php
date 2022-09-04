<?php
include "../base.php";
$data=$news->find($_POST['id']);
switch ($_POST['good']) {
    case 0:
        $logs->del(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data['goods']--;
        break;
    case 1:
        $logs->save(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data['goods']++;
        break;
    
    default:
        
        break;
}
$news->save($data);