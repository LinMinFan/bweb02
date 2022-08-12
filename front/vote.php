<?php
$subject = $que->find(['id' => $_GET['id']]);
?>

<div class="w100">
    <fieldset class="w80 mg">
        <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
        <h3><?=$subject['text'];?></h3>
        <table class="w100">
            <?php
            $opts = $que->all(['parent' => $_GET['id']]);
            foreach ($opts as $key => $opt) {
            ?>
                <tr>
                <td class="w5">
                        <input type="radio" name="opt" value="<?=$opt['id'];?>">
                        <span><?=$opt['text'];?></span>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct"><button onclick="vote()">我要投票</button></div>
    </fieldset>
</div>

<script>
    function vote(){
        let id = $("input[type='radio']:checked").val();
        $.post("./api/vote.php",{id},()=>{
            location.href="?do=result&id="+id;
        })
    }
</script>