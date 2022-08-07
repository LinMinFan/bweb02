<?php
include "../base.php";

$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

$type=$array[$_GET['type']];

$ress=$news->all(['type'=>$type]);

foreach ($ress as $key => $res) {
?>
<p><a href="javascript:gettext(<?=$res['id'];?>)"><?=$res['title'];?></a></p>
<?php
}