<?php
include "../base.php";


$array=['健康新知'=>1,'菸害防治'=>2,'癌症防治'=>3,'慢性病防治'=>4];

$nns=$news->all(['type'=>$array[$_POST['text']]]);
foreach ($nns as $key => $nn) {
?>
<p>
<a href="javascript:news_text(<?=$nn['id'];?>)"><?=$nn['title'];?></a>
</p>
<?php    
}