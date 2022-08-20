<?php
include "../base.php";
$do=$_GET['do'];

foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
        $$do->del($id);
    }else {
        
        switch ($do) {
            case 'news':
                $data=$$do->find($id);
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                $$do->save($data);
                break;
            
            default:
                # code...
                break;

        }
       
    }
}

to("../back.php?do=$do");