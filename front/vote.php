<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['parent'=>$_GET['id']]);
?>
<fieldset class="w90 mg_at">
    <legend>目前位置: 首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w100">
        <?php
            foreach ($opts as $key => $opt) {
                ?>
                    <tr>
                        <td class="w5">
                            <input type="radio" name="opt" value="<?=$opt['id'];?>">
                        </td>
                        <td class="w90"><?=$opt['text'];?></td>
                    </tr>
                <?php
        }
        ?>
    </table>
    <div class="ct">
        <button onclick="vote($('input:checked').val())">我要投票</button>
    </div>
</fieldset>

<script>
   function vote(id){
    //console.log(id);
    $.post("./api/vote.php",{id},(res)=>{
        location.href="?do=result&id="+res;
    })
   }
</script>