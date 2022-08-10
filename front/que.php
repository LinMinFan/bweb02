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
<div class="outside w100 mg">
<fieldset class="w100 mg">
    <legend>目前位置: 首頁 > 問卷調查 </legend>
    <table class="w90 mg">
        <tr>
            <td class="w5">編號</td>
            <td class="w70">問卷題目</td>
            <td class="w5">投票總數</td>
            <td class="w5">結果</td>
            <td class="w5">狀態</td>
        </tr>
        <?php
    
        $datas=$$do->all(['parent'=>0]);
        foreach ($datas as $key => $data) {
        ?>
        <tr>
            <td class="w5"><?=$key+1;?>.</td>
            <td class="w70"><?=$data['text'];?></td>
            <td class="w5"><?=$data['count'];?></td>
            <td class="w5"><a href="?do=result&id=<?=$data['id'];?>">結果</a></td>
            <td class="w5">
                <?php
                    if (isset($_SESSION['acc'])) {
                    ?>
                        <a href="?do=vote&id=<?=$data['id'];?>">參與投票</a>
                    <?php
                    }else {
                    ?>
                        <span>請先登入</span>
                    <?php
                    }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    
</fieldset>
</div>

