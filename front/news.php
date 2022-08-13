<fieldset class="w80 mg">
    <legend>目前位置: 首頁 > 最新文章區</legend>
    <table class="w100">
        <tr>
            <td class="w25">標題</td>
            <td class="w50">內容</td>
            <td class="w25"></td>
        </tr>
        <?php
         $p=$_GET['p']??1;
         $counts=$news->math('count','id',['sh'=>1]);
         $div=5;
         $start=($p-1)*$div;
         $pages=ceil(($counts/$div));
         $pre=(($p-1)>0)?($p-1):1;
         $next=(($p+1)<=$pages)?($p+1):$pages;
         foreach ($news->all(['sh'=>1]," limit $start,$div") as $key => $data){
            ?>
                <tr>
                    <td class="w25 clo news_title" ><?=$data['title'];?></td>
                    <td class="w45 news_text">
                        <span><?=mb_substr($data['text'],0,10);?>...</span>
                        <span style="display:none;"><?=$data['text'];?></span>
                    </td>
                    <td class="w30">
                        <?php
                            if (isset($_SESSION['acc'])) {
                                if (($log->math('count','id',['user'=>$_SESSION['acc'],'news'=>$data['id']]))>0) {
                                    ?>
                                        <a href="javascript:great('收回讚',<?=$data['id'];?>)">收回讚</a>
                                    <?php
                                }else {
                                    ?>
                                        <a href="javascript:great('讚',<?=$data['id'];?>)">讚</a>
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
                for ($i=1; $i <= $pages ; $i++) { 
                    ?>
                        <a href="?do=<?=$do;?>&p=<?=$i;?>"<?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
                    <?php
                }
            ?>
            <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
</fieldset>
<script>
 function great(text,id){
    $.post("./api/great.php",{text,id},()=>{
        location.reload();
    })
 }

 $('.news_title').on('click',function (){
    $(this).next().children().toggle();
 })
</script>