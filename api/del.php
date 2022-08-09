<?php
include "../base.php";

$ids=$_POST['ids'];

foreach ($ids as $id) {
    $user->del($id);
}