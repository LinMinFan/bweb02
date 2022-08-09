<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['parent'=>$_GET['id']]);
?>
<div>
    <span>
        目前位置：首頁>分類網誌><span class="menu_title">問卷調查><?=$subject['text'];?></span>
    </span>
</div>
<h3><?=$subject['text'];?></h3>
<div class="opts_box">
<table>
<?php
foreach ($opts as $key => $opt) {
?>
<tr>
    <td><input type="radio" name="opt" data-id="<?=$opt['id'];?>"></td>
    <td><?=$opt['text'];?></td>
</tr>
<?php
}
?>
</table>
</div>
<div class="ct"><button onclick="vote()">我要投票</button></div>

<script>
function vote(){
        let id=$('input:checked').data('id');
        let parent=<?=$_GET['id'];?>;
        $.post("./api/vote.php",{id,parent},()=>{
            location.href="?do=result&id="+parent;
        })
    }
</script>

