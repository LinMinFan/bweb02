<?php
$subject=$que->find($_GET['id']);
$parent=$subject['id'];
$opts=$que->all(['parent'=>$parent]);
?>
<fieldset class="w80 mg">
    <legend>「目前位置: 首頁 > 問卷調查 > <?=$subject['text'];?> </legend>
    <h3><?=$subject['text'];?></h3>
        <?php
            foreach ($opts as $key => $opt) {
                ?>
                    <p>
                        <input type="radio" name="opt" value="<?=$opt['id'];?>">
                        <span><?=$opt['text'];?></span>
                    </p>
                <?php
            }
        ?>
        <div class="ct">
            <button onclick="vote($('input:checked').val(),<?=$parent;?>)">我要投票</button>
        </div>
</fieldset>

<script>
   function vote(id,parent){
        $.post("./api/vote.php",{id,parent},()=>{
            location.href="?do=result&id="+parent;
        })
   }

</script>