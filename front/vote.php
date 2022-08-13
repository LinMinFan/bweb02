<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['parent'=>$_GET['id']]);
?>
<fieldset class="w80 mg">
    <legend>目前位置: 首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
       
        <?php
         
         foreach ($opts as $key => $opt){
            ?>
                <tr>
                    <td class="w5">
                        <input type="radio" name="opt" value="<?=$opt['id'];?>" data-parent="<?=$_GET['id'];?>">
                    </td>
                    <td class="w80">
                        <?=$opt['text'];?>
                    </td>
                </tr>
            <?php
         }
        ?>
    </table>
    <div class="ct">
        <button onclick="vote($('input:checked').val(),$('input:checked').data('parent'))">我要投票</button>
    </div>
</fieldset>
<script>
 function vote(id,parent){
    //console.log(id,parent);
    $.post("./api/vote.php",{id,parent},()=>{
        location.href="?do=result&id="+parent;
    })
 }
</script>
