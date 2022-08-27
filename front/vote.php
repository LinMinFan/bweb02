<?php
$main=$que->find($_GET['id']);
?>
<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 問卷調查 > <?=$main['text'];?></legend>
    <form action="./api/vote.php?id=<?=$main['id'];?>" method="post">
        <?php
            foreach ($que->all(['parent'=>$main['id']]) as $key => $sub) {
                ?>
                <p><input type="radio" name="vote" value="<?=$sub['id'];?>"><?=$sub['text'];?></p>
                <?php
            }
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
    
</fieldset>

