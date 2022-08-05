<fieldset>
    <legend>目前位置：首頁>分類網誌><span id="header">最新文章區</span></legend>
    <table id="news">
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td width="20%"></td>
        </tr>
        <?php
        $p=($_GET['p'])??1;
        $allns=$news->math('count','id',['sh'=>1]);
        $div=5;
        $pages=ceil($allns/$div);
        $start=($p-1)*$div;
        $pre=($p-1>0)?$p-1:1;
        $next=($p+1<=$pages)?$p+1:$pages;

        $rows=$news->all(['sh'=>1]," limit $start,$div");

        foreach ($rows as $row) {
        ?>
        <tr>
            <td class="title clo"><?=$row['title'];?></td>
            <td>
                <span class="summary"><?=mb_substr($row['text'],0,20);?>...</span>
                <span class="full" style="display:none;"><?=nl2br($row['text']);?></span>
            </td>
            <td>
                <span><?=$row['good'];?></span>個人說<img src="./icon/02B03.jpg" width="25px">
                <?php
                if(isset($_SESSION['user'])){
                    if ($log->math('count','id',['news'=>$row['id'],'user'=>$_SESSION['user']])>=1){
                    ?>
                    <a class="great" href="#" data-id=<?=$row['id'];?>>收回讚</a>
                    <?php
                    }else {
                    ?>
                    <a class="great" href="#" data-id=<?=$row['id'];?>>讚</a>
                    <?php
                    }
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
        
    </table>
    <div style="text-align:center;">
    <a href="?do=news&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages; $i++) { 
        ?>
        <a href="?do=news&p=<?=$i;?>" <?=($p==$i)?"style='font-size:20px'":"";?>><?=$i;?></a>
        <?php
        }
        ?>
    <a href="?do=news&p=<?=$next;?>">></a>
    </div>
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
