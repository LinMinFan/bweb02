<?php
include "../base.php";

if(!empty($_POST['subject'])){
    $que->save(['text'=>$_POST['subject'],'count'=>0,'subject_id'=>0]);
    $subject_id=$que->find(['text'=>$_POST['subject']])['id'];

    if(!empty($_POST['option'])){
        foreach ($_POST['option'] as $opt) {
            $que->save(['text'=>$opt,'count'=>0,'subject_id'=>$subject_id]);
        }
    }
}

to("../back.php?do=que");
?>