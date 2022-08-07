<?php
include "../base.php";
if (!empty($_POST['subject'])) {
    $que->save(['text'=>$_POST['subject'],'count'=>0,'subject_id'=>0]);
    $sjt_id=$que->find(['text'=>$_POST['subject']])['id'];

    if (!empty($_POST['opt'])) {
        foreach ($_POST['opt'] as $key => $opt) {
            $que->save(['text'=>$opt,'count'=>0,'subject_id'=>$sjt_id]);
        }
    }
}

to("../back.php?do=que");