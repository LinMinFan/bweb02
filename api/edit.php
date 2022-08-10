<?php
include "../base.php";
$do=$_GET['do'];
$ids=($_POST['id'])??"";

switch ($do) {
    case 'user':
        foreach ($ids as $id) {
            if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                $$do->del($id);
            } 
        }
        break;
    case 'news':
        foreach ($ids as $id) {
            if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                $$do->del($id);
            }else {
                $data=$$do->find($id);
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                $$do->save($data);
            }
        }
        break;
    case 'que':
        $data=['text'=>$_POST['title'],'count'=>0,'parent'=>0];
        $$do->save($data);
        $parent=$$do->find(['text'=>$_POST['title']])['id'];
        $opts=$_POST['opt'];
        foreach ($opts as $key => $opt) {
            $data_opt=['text'=>$opt,'count'=>0,'parent'=>$parent];
            $$do->save($data_opt);
        }
        break;
    default:
        # code...
        break;
}

to("../back.php?do=".$do);