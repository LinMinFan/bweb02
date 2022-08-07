<?php
include "../base.php";

if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $news->del($id);
        }else {
            $data=$news->find($id);
            $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $news->save($data);
        }
    }
}

to("../back.php?do=news");