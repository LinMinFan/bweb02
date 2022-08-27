<fieldset class="w90 mg">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table class="w100">
        <tr>
            <td class="w35 ct">標題:</td>
            <td class="w35 ct">內容:</td>
            <td class="w30 ct"></td>
        </tr>
        <?php
        $p=$_GET['p']??1;
        $div=5;
        $count=$news->math('count','id',$sh);
        $pages=ceil($count/$div);
        $start=($p-1)*$div;
        $pre=($p-1>0)?$p-1:1;
        $next=($p+1<=$pages)?$p+1:$pages;
        foreach ($news->all($sh," limit $start,$div") as $key => $data){
            ?>
                <tr>
                <td class="w35 clo ssaa"><?=$data['title'];?></td>
                <td class="w35 ct">
                    <span><?=mb_substr($data['text'],0,10);?>...</span>
                    <span class="all" style="display:none;"><?=$data['text'];?></span>
                </td>
                <td class="w30 ct">
                    <?php
                        if (isset($_SESSION['acc'])) {
                            if ($log->math('count','id',['user'=>$_SESSION['acc'],'news'=>$data['id']])>0) {
                            ?>
                            <a href="javascript:goods(1,<?=$data['id'];?>)">收回讚</a>
                            <?php
                            }else{
                                ?>
                                <a href="javascript:goods(0,<?=$data['id'];?>)">讚</a>
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
                <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"style=''font-size:20px":"";?>><?=$i;?></a>
            <?php
        }
        ?>
        <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
</fieldset>

<script>
$('.ssaa').on('click',function(){
    $(this).next().children().toggle();
})
</script>