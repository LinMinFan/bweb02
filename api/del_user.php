<?php
include "../base.php";

if (!empty($_POST['del'])) {
    foreach ($_POST['del'] as $id) {
        $user->del($id);
    }
}
?>