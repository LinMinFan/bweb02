<?php
include "../base.php";
$good=$news->find($_POST['id']);
switch ($_POST['text']) {
    case '讚':
        $log->save(['new'=>$_POST['id'],'user'=>$_SESSION['acc']]);
        $good['good']++;
        break;
    case '收回讚':
        $log->del(['new'=>$_POST['id'],'user'=>$_SESSION['acc']]);
        $good['good']--;
        break;
    
    default:
        # code...
        break;
}
$news->save($good);