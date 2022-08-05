<fieldset>
    <legend>目前位置：首頁>問券調查</legend>
    <table id="news">
        <tr>
            <td width="5%">編號</td>
            <td width="70%">問券題目</td>
            <td width="10%">投票總數</td>
            <td width="5%">結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $qqs=$que->all(['subject_id'=>0]);
        foreach ($qqs as $key => $qq) {
        ?>
        <tr>
            <td width="5%"><?=$key+1;?></td>
            <td width="70%"><?=$qq['text'];?></td>
            <td width="10%"><?=$qq['count'];?></td>
            <td width="5%"><a href="?do=result&id=<?=$qq['id'];?>">結果</a></td>
            <td>
                <?php
                if(!isset($_SESSION['user'])){
                ?>
                <span>請先登入</span>
                <?php
                }else {
                ?>
                <a href="?do=voted&subject=<?=$qq['id'];?>">參與投票</a>
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

<script>
$('.title').on('click',function(){
    $(this).next().children().toggle();
})

$('.great').on('click',function(){
    let type=$(this).text();
    let num =Number( $(this).parent().find('span').text())
    let id=$(this).data('id')
    $.post("./api/good.php",{id,type},()=>{
        
        if (type=="讚") {
            $(this).text("收回讚");
            $(this).parent().find('span').text((num+1))
        }else {
            $(this).text("讚");
            $(this).parent().find('span').text((num-1))
        }
    })
})

</script>
