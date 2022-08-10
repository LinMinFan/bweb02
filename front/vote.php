<style>
    .outside{
        width: 80%;
        display: flex;
        justify-content: center;
    }
    .block{
        display: block;
    }
    .flex{
        display: flex;
    }
    .flex_c{
        display: flex;
        justify-content: center;
    }
    .flex_a{
        display: flex;
        justify-content: space-around;
    }

    .w5{
        width: 5%;
    }
    .w10{
        width: 10%;
    }
    .w20{
        width: 20%;
    }
    .w35{
        width: 35%;
    }
    .w40{
        width: 40%;
    }
    .w50{
        width: 50%;
    }
    .w60{
        width: 60%;
    }
    .w70{
        width: 70%;
    }
    .w80{
        width: 80%;
    }
    .w90{
        width: 90%;
    }
    .w100{
        width: 100%;
    }

    .mg{
        margin: 0 auto;
    }

</style>
<?php
    $data=$que->find(['id'=>$_GET['id']]);
?>
<div class="outside w100 mg">
<fieldset class="w100 mg">
    <legend>目前位置: 首頁 > 問卷調查 > <span><?=$data['text'];?></span></legend>
    <h3><?=$data['text'];?></h3>
    <table class="w90 mg">
        <?php
        $opts=$que->all(['parent'=>$_GET['id']]);
        foreach ($opts as $key => $opt) {
        ?>
        <tr>
            <td class="w5">
                <input type="radio" name="opt" id="opt" data-id="<?=$opt['id'];?>">
            </td>
            <td>
                <span><?=$opt['text'];?></span>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <button type="button" onclick="vote()">我要投票</button>
    </div>
</fieldset>
</div>

<script>
    function vote(){
        let id=$('input:checked').data('id');
        $.post("./api/vote.php",{id},(res)=>{
            location.href="?do=result&id="+res;
        })
    }

</script>