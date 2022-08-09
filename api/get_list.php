<?php
include "../base.php";

$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

$data=$news->all(['sh'=>1,'type'=>$array[$_GET['text']]]);

foreach ($data as $dt) {
?>
<p><a href="javascript:text(<?=$dt['id'];?>)"><?=$dt['title'];?></a></p>
<?php
}