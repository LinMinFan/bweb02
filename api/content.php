<?php
include "../base.php";


$content=$news->find(['id'=>$_POST['id']])['text'];
?>  
<p><?=$content;?></p>
