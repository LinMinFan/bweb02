<?php
include "../base.php";

switch ($_GET['do']) {
    case 'users':
        if (!empty($_POST['id'])) {
            foreach ($_POST['id'] as $key => $id) {
                if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                    ${$_GET['do']}->del($id);
                }
            }
        }
        break;
    case 'news':
        if (!empty($_POST['id'])) {
            foreach ($_POST['id'] as $key => $id) {
                if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
                    ${$_GET['do']}->del($id);
                }else{
                    $data=${$_GET['do']}->find($id);
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    ${$_GET['do']}->save($data);
                }
            }
        }
        break;
    
    default:
        
        break;
}
to("../back.php?do={$_GET['do']}");
