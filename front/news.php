<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table class="w100">
        <tr>
            <td class="w40 clo">標題</td>
            <td class="w40">內容</td>
            <td></td>
        </tr>
        <?php
        $p=$_GET['p']??1;
        $countN=$news->math('count','id',$sh);
        $div=5;
        $pages=ceil($countN/$div);
        $start=($p-1)*$div;
        $pre=($p-1>0)?$p-1:1;
        $next=($p+1<=$pages)?$p+1:$pages;
        foreach ($news->all($sh," limit $start,$div") as $key => $nn) {
            ?>
            <tr>
                <td class="w40 clo ns_t"><?=$nn['title'];?></td>
                <td class="w40 ns_c">
                    <?=mb_substr($nn['text'],0,20);?>...
                    <span class="dpn all"><?=$nn['text'];?></span>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['acc'])) {
                        if ($logs->math('count','id',['user'=>$_SESSION['acc'],'news'=>$nn['id']])>0) {
                            ?>
                            <a href="javascript:goods(<?=$nn['id'];?>,0)">收回讚</a>
                            <?php
                        }else{
                            ?>
                            <a href="javascript:goods(<?=$nn['id'];?>,1)">讚</a>
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
    <div class="ct">
        <a href="?do=<?=$do;?>&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages; $i++) { 
            ?>
            <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($p==$i)?"class='fs24'":"";?>><?=$i;?></a>
            <?php
        }
        ?>
        <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
</fieldset>
<script>
   $('.ns_t').on('click',function(){
    $(this).next().children().toggle();
   })

   function goods(id,good){
    $.post("./api/goods.php",{id,good},()=>{
        reload();
    })
   }
</script>