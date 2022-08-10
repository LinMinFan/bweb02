<?php
include "../base.php";

$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

$type=$array[$_POST['title']];

$nns=$news->all(['type'=>$type]);

foreach ($nns as $key => $nn) {
?>
<p><a href="javascript:content(<?=$nn['id'];?>)"><?=$nn['title'];?></a></p>
<?php
}