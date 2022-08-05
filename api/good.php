<?php
include_once "../base.php";

$type=$_POST['type'];
$id=$_POST['id'];

$nns=$news->find($id);

switch ($type) {
    case '讚':
        $nns['good']++;
        $log->save(['news'=>$id,'user'=>$_SESSION['user']]);
        break;
    case '收回讚':
        $nns['good']--;
        $log->del(['news'=>$id,'user'=>$_SESSION['user']]);
        break;
    
    default:
        # code...
        break;
    }
 $news->save($nns);    