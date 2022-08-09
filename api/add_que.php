<?php
include "../base.php";

if (!empty($_POST['s_title'])) {
    $subject=['text'=>$_POST['s_title'],'count'=>0,'parent'=>0];
    $que->save($subject);
    $parent=$que->find(['text'=>$_POST['s_title']])['id'];
    if (!empty($_POST['s_opt'])) {
        foreach ($_POST['s_opt'] as $key => $opt) {
            $sub=['text'=>$opt,'count'=>0,'parent'=>$parent];
            $que->save($sub);
        }
    }
}
to("../back.php?do=que");