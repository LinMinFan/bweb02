<fieldset>
    <legend><p>目前位置：首頁><span >問券調查</span></p></legend>
    
    <table style="width:100%;">
        <tr>
            <td style="width:5%;">編號</td>
            <td >問卷題目</td>
            <td style="width:5%;">投票總數</td>
            <td style="width:5%;">結果</td>
            <td style="width:5%;">狀態</td>
        </tr>
        <?php
        $qqs=$que->all(['subject_id'=>0]);
        foreach ($qqs as $key => $qq) {
        ?>
        <tr>
            <td><span><?=$key+1;?>.</span></td>
            <td><?=$qq['text'];?></td>
            <td><?=$qq['count'];?></td>
            <td><a href="?do=result&id=<?=$qq['id'];?>">結果</a></td>
           
            <td><?=(isset($_SESSION['acc']))?"<a href='?do=vote&id=".$qq['id']."'>參與投票</a>":"請先登入";?></td>
        </tr>
        <?php
        }
        ?>
    </table>


</fieldset>
