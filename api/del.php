<?php
include "../base.php";
if (!empty($_POST['ids'])) {
    foreach ($_POST['ids'] as  $id) {
        $user->del($id);
    }
}