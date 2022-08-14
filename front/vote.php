<?php
$parent=$_GET['id'];
$subject=$que->find($parent);
$opts=$que->all(['parent'=>$parent])
?>

<fieldset class="w80 mg">
    <legend>目前位置 : 首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
        
        <?php
            foreach ($opts as $key => $opt) {
                ?>
                    <tr>
                        <td class="w5 ct">
                            <input type="radio" name="opt" value="<?=$opt['id'];?>">
                        </td>
                        <td class="w80"><?=$opt['text'];?></td>
                       
                    </tr>
                <?php
            }
        ?>
    </table>
    <div class="ct">
        <button onclick="vote($('input:checked').val(),<?=$parent;?>)">我要投票</button>
    </div>
</fieldset>

<script>
    function vote(opt,parent){
        $.post("./api/vote.php",{opt,parent})
        location.href="?do=result&id="+parent;
    }
</script>
