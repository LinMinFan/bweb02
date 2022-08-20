<?php
include "../base.php";


$nn=$news->find(['id'=>$_POST['id']]);

echo "<pre>".$nn['text']."</pre>";
