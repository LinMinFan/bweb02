<?php
include "../base.php";

if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        switch ($_GET['do']) {
            case 'user':
                if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                    $user->del($id);
                }
                break;
            case 'news':
                if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                    $news->del($id);
                }else{
                    $data=$news->find($id);
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    $news->save($data);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}

if ($_GET['do']=="que") {
    $subject=['text'=>$_POST['subject'],'count'=>0,'parent'=>0];
    $que->save($subject);
    $opts=$_POST['opt'];
    foreach ($opts as $key => $opt) {
        $sub=['text'=>$opt,'count'=>0,'parent'=>$que->find(['text'=>$_POST['subject']])['id']];
        $que->save($sub);
    }
}
to("../back.php?do=".$_GET['do']);