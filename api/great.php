<?php
include "../base.php";

switch ($_POST['text']) {
    case '讚':
        $row=['user'=>$_SESSION['acc'],'news'=>$_POST['id']];
        $log->save($row);
        $data=$news->find($_POST['id']);
        $data['count']++;
        break;
    case '收回讚':
        $log->del(['user'=>$_SESSION['acc'],'news'=>$_POST['id']]);
        $data=$news->find($_POST['id']);
        $data['count']--;
        break;
    
    default:
        # code...
        break;
}
$news->save($data);
?>

