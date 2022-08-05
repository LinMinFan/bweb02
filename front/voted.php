<?php
$subject=$que->find($_GET['subject']);
$opts=$que->all(['subject_id'=>$_GET['subject']]);
?>
<fieldset>
    <legend>目前位置：首頁>問券調查><span><?=$subject['text'];?></span></legend>

    <h3><?=$subject['text'];?></h3>

    <form action="./api/vote.php" method="POST">
    <ul style="list-style:none;">
    <?php
    foreach ($opts as $key => $opt) {
    ?>
    <li><input type="radio" name="opt" value="<?=$opt['id'];?>"> <?=$opt['text'];?></li>
    <?php
    }
    ?>
    </ul>
    <input type="submit" value="我要投票">
    </form>
    
    