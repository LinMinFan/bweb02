<?php
include "../base.php";
$do=$_GET['do'];
$ids=$_POST['id']??"";


switch ($do) {
    case 'user':
        foreach ($ids as $key => $id) {
            if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                $$do->del($id);
            }
        }
    case 'news':
        foreach ($ids as $key => $id) {
            if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                $$do->del($id);
            }else {
                $data=$$do->find($id);
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                $$do->save($data);
            }
        }
    case 'que':
                $subject=['text'=>$_POST['title'],'count'=>0,'parent'=>0];
                $$do->save($subject);
                $parent=$$do->find(['text'=>$_POST['title']])['id'];
                $subs=$_POST['text'];
                foreach ($subs as  $sub) {
                    $opt=['text'=>$sub,'count'=>0,'parent'=>$parent];
                    $$do->save($opt);
                }
        break;
    
    default:
        # code...
        break;
}

to("../back.php?do=".$do);