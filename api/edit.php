<?php
include "../base.php";
$do=$_GET['do'];


if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        switch ($do) {
            case 'user':
                if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                    $$do->del($id);
                }
                break;
            case 'news':
                if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                    $$do->del($id);
                }else {
                    $data=$$do->find($id);
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    $$do->save($data);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}

if ($do='que') {
    $subject=['text'=>$_POST['subject'],'count'=>0,'parent'=>0];
    $que->save($subject);
    $opts=$_POST['opt'];
    $parent=$que->find(['text'=>$_POST['subject']])['id'];
    foreach ($opts as $key => $opt) {
        $sub=['text'=>$opt,'count'=>0,'parent'=>$parent];
        $que->save($sub);
    }
}

to("../back.php?do=".$do);