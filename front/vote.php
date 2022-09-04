<?php
$id=$_GET['id'];
$main=$ques->find($id);
?>
<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 問卷調查 > <?=$main['text'];?></legend>
    <form action="./api/vote.php?id=<?=$id;?>" method="POST">
    <?php
    foreach ($ques->all(['parent'=>$id]) as $key => $sub) {
        ?>
        <div>
            <input type="radio" name="opt" value="<?=$sub['id'];?>">
            <?=$sub['text'];?>
        </div>
        <?php
    }
    ?>
    <div class="ct">
        <input type="submit" value="我要投票">
    </div>
    </form>    
</fieldset>
<script>

</script>