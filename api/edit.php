<?php
include "../base.php";
$do=$_GET['do'];

if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
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
                    $row=$$do->find($id);
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    $$do->save($row);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}

if ($do=="que") {
    $subject=['text'=>$_POST['subject'],'count'=>0,'parent'=>0];
    $$do->save($subject);
    $parent=$$do->find(['text'=>$_POST['subject']])['id'];
    $opts=$_POST['opt'];
    foreach ($opts as $opt) {
        $sub=['text'=>$opt,'count'=>0,'parent'=>$parent];
        $$do->save($sub);
    }
}

to("../back.php?do=$do");