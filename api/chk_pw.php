<?php
include "../base.php";

$chkpw=$user->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);


if ($chkpw==1) {

    $_SESSION['acc']=$_POST['acc'];
    echo 1;

}else {
    echo 0;
}
?>
