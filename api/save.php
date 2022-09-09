<?php
include "../base.php";
$do=$_GET['do'];
if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            $$do->del($id);
        }else{
            $data=$$do->find($id);
            switch ($do) {
                case 'news':
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                
                default:
                    
                    break;
            }
            $$do->save($data);
        }
    }
}
to("../back.php?do=$do");