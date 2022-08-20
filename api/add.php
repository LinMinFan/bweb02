<?php
include "../base.php";
$do=$_GET['do'];

$$do->save(['text'=>$_POST['subject'],'parent'=>0,'count'=>0]);
$parent=$$do->find(['text'=>$_POST['subject']])['id'];
foreach ($_POST['opt'] as $key => $opt) {
    $$do->save(['text'=>$opt,'parent'=>$parent,'count'=>0]);
}

to("../back.php?do=$do");