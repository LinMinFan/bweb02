<fieldset class="w90">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table class="w100">
        <tr>
            <td class="w30 ct">標題</td>
            <td class="w40 ct">內容</td>
            <td class="w25"></td>
        </tr>
        <?php
        $p=$_GET['p']??1;
        $all_num=$$do->math('count','id',$sh);
        $div=5;
        $pages=ceil(($all_num/$div));
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $nns=$news->all(" limit $start,$div");
        foreach ($nns as $key => $nn) {
            ?>
            <tr>
                <td class="w30 clo news_title"><?=$nn['title'];?></td>
                <td class="w40 news_content">
                    <span><?=mb_substr($nn['text'],0,10);?>...</span>
                    <span class="hid_text" style="display:none;"><?=$nn['text'];?></span>
                </td>
                <td class="w25 ct">
                    <?php
                        if (isset($_SESSION['acc'])) {
                            $chk_log=$log->math('count','id',['new'=>$nn['id'],'user'=>$_SESSION['acc']]);
                            if ($chk_log>0) {
                                ?>
                                    <a href="javascript:great('收回讚',<?=$nn['id'];?>)">收回讚</a>
                                <?php
                            }else {
                                ?>
                                    <a href="javascript:great('讚',<?=$nn['id'];?>)">讚</a>
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
                <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
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

 $('.news_title').on('click',function(){
    $(this).next().children().toggle();
 })
</script>