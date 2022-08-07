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
    
    <table style="width:100%;">
        <tr>
            <td style="width:45%;"><?=$que->find($_GET['id'])['text'];?></td>
            <td style="width:45%;"></td>
        </tr>
        <?php
        $qqs=$que->all(['subject_id'=>$_GET['id']]);
        foreach ($qqs as $key => $qq) {
            $countS=$que->find($_GET['id'])['count'];
            $countO=$que->find($qq['id'])['count'];
            $cent=round((($countO/(($countS==0)?1:$countS))),2)*100;
        ?>
        <tr>
            <td><?=$qq['text'];?></td>
            <td style="position: relative;">
                <div class="resbox ct" style="--wd:<?=$cent;?>%">
                    
                    <span><?=$countO;?>票(<?=$cent;?>%)</span>
                </div>
                
            </td>
           
        </tr>
        <?php
        }
        ?>
    </table>
        <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>

</fieldset>
