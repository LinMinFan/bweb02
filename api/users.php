<?php
include "../base.php";

$users=$user->all();
foreach ($users as $user) {
    if ($user['acc'] !== 'admin') {
    
?>
<tr>
    <td><?=$user['acc'];?></td>
    <td><?=str_repeat("*",strlen($user['pw']));?></td>
    <td><input class="delid" type="checkbox" name="del[]" value="<?=$user['id'];?>"></td>
</tr>
<?php
}
}

?>