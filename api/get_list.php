<?php
include_once "../base.php";
$array=["健康新知"=>"1","菸害防制"=>"2","癌症防治"=>"3","慢性病防治"=>"4"];
$type=$array[$_GET['type']];

$posts=$news->all(['type'=>$type]);

foreach ($posts as $post) {
    echo "<a href='javascript:getnews({$post['id']})'>";
    echo $post['title'];
    echo "</a>";
}

