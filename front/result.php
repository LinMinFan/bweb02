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

    .pot_box{
        position: relative;
        width: 100%;
        height: 30px;
    }
    .res_box{
        width: var(--i);
        background: #ddd;
        height: 30px;
    }
    .res_box+span{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

</style>
<?php
    $subject=$que->find($_GET['id']);
?>
<div class="outside w100 mg">
<fieldset class="w100 mg">
    <legend>目前位置: 首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <table class="w90 mg">
        <?php
        $opts=$que->all(['parent'=>$_GET['id']]);
        $ssum=($subject['count']==0)?1:$subject['count'];
        foreach ($opts as $key => $opt) {
        $cent=round($opt['count']/$ssum,2)*100;
        ?>
        <tr>
            <td class="w50">
                <span><?=$opt['text'];?></span>
            </td>
            <td class="w50 pot_box" >
                <div style="--i:<?=$cent;?>%;" class="res_box">
                </div>
                <span><?=$opt['count'];?>票(<?=$cent;?>%)</span>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>
</div>

<script>
    function vote(){
        let id=$('input:checked').data('id');
        $.post("./api/vote.php",{id},()=>{
            location.href="?do=result&id="+id;
        })
    }

</script>