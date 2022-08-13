<?php
include "../base.php";


echo $news->find(['id'=>$_POST['id']])['text'];

