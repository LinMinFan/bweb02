<?php
include_once "../base.php";
unset($_POST['pw2']);
$user->save($_POST);

?>