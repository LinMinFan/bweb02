<?php
include "../base.php";

$nn=$news->find($_POST['id']);

switch ($_POST['text']) {
    case '讚':
    case '-讚':
        $nn['good']++;
        $log->save(['news'=>$_POST['id'],'user'=>$_SESSION['acc']]);
        break;
    case '收回讚':
    case '-收回讚':
        $nn['good']--;
        $log->del(['news'=>$_POST['id'],'user'=>$_SESSION['acc']]);
        break;
    
    default:
        # code...
        break;
}

$news->save($nn);