<?php
$parent=$_GET['id'];
$subject=$que->find($parent);
$opts=$que->all(['parent'=>$parent]);
?>
<fieldset class="w90">
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
        <?php
            foreach ($opts as $key => $opt) {
                ?>
                    <tr>
                        <td>
                            <input type="radio" name="vote" value="<?=$opt['id'];?>">
                        </td>
                        <td>
                            <?=$opt['text'];?>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <div class="ct">
        <button onclick="vote(<?=$parent;?>,$('input:checked').val())">我要投票</button>
    </div>
</fieldset>

<script>
    function vote(parent,opt){
        $.post("./api/vote.php",{parent,opt},()=>{
            location.href="?do=result&id="+parent;
        })
    }
</script>