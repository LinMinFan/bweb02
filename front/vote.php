<style>
    .resbox{
        background: #ddd;
        width: var(--wd);
        height: 30px;
    }
    .resbox span{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        width: 100px;
    }
</style>

<fieldset>
    <legend><p>目前位置：首頁><span >問券調查><?=$que->find($_GET['id'])['text'];?></span></p></legend>
    <form action="./api/vote.php" method="POST">
    <table>
        <tr>
            <td style="width:90%;"><?=$que->find($_GET['id'])['text'];?></td>
        </tr>
        <?php
        $qqs=$que->all(['subject_id'=>$_GET['id']]);
        foreach ($qqs as $key => $qq) {
        ?>
        <tr>
            <td><input type="radio" name="opt" value="<?=$qq['id'];?>"><?=$qq['text'];?></td>
        </tr>
        <?php
        }
        ?>
    </table>
        <div class="ct"><input type="submit" value="我要投票"></div>
        </form>
</fieldset>
