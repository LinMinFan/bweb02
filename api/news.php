<?php
include "../base.php";
foreach ($_POST['id'] as $id) {
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
       $news->del($id);
    }else {
        $row=$news->find($id);
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $news->save($row);
    }
}


to("../back.php?do=news");

?>