<?php
include "../base.php";
$que->save(['text'=>$_POST['text'],'parent'=>0,'total'=>0]);
$qm=$que->find(['text'=>$_POST['text']]);
$qs=[];
foreach ($_POST['text2'] as $key => $text2) {
    $qs=['text'=>$text2,'parent'=>$qm['id'],'total'=>0];
    $que->save($qs);
}
to("../back.php?do=$do");