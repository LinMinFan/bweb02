<?php
include "../base.php";
$qm=$que->find($_POST['qm']);
$qs=$que->find($_POST['qs']);
$qm['total']++;
$qs['total']++;
$que->save($qm);
$que->save($qs);