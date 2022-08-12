<style>
    .news_content{
        position: relative;
    }
    .hidtext{
        position: absolute;
        left: -20px;
        top: 20px;
        background: #000000aa;
        color: #fff;
        width: 300px;
        height: 400px;
        overflow: auto;
    }
</style>
<div class="w100">
    <fieldset class="w80 mg">
        <legend>目前位置：首頁 > 人氣文章區</legend>
        <table class="w100">
            <tr>
                <td class="w20">標題</td>
                <td class="w50">內容</td>
                <td class="w20">人氣</td>
            </tr>
            <?php
            $p = $_GET['p'] ?? 1;
            $counts = $news->math('count', 'id', ['sh' => 1]);
            $div = 5;
            $pages = ceil(($counts / $div));
            $start = ($p - 1) * $div;
            $pre = (($p - 1) > 0) ? ($p - 1) : 1;
            $next = (($p + 1) <= $pages) ? ($p + 1) : $pages;
            $datas = $news->all(['sh' => 1], " ORDER BY count desc limit $start,$div");
            foreach ($datas as $key => $data) {
            ?>
                <tr>
                    <td class="w20 clo news_title"><?=$data['title'];?></td>
                    <td class="w50 news_content">
                        <span><?=mb_substr($data['text'],0,10);?>...</span>
                        <span class="hidtext" style="display:none;"><?=$data['text'];?></span>
                    </td>
                    <td class="w20">
                        <?php
                            if (isset($_SESSION['acc'])) {
                                if (($log->math('count','id',['news'=>$data['id'],'user'=>$_SESSION['acc']]))>0) {
                                    ?>
                                        <span><?=$data['count'];?>個人說<span class="good">-</span> </span>
                                        <a href="javascript:great('收回讚',<?=$data['id'];?>)">收回讚</a>
                                    <?php
                                }else {
                                    ?>
                                        <span><?=$data['count'];?>個人說<span class="good">-</span> </span>
                                        <a href="javascript:great('讚',<?=$data['id'];?>)">讚</a>
                                    <?php
                                }
                            }else {
                                ?>
                                        <span><?=$data['count'];?>個人說<span class="good">-</span> </span>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <a href="?do=<?= $do; ?>&p=<?= $pre; ?>"><</a>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                        <a href="?do=<?= $do; ?>&p=<?= $i; ?>" <?= ($i == $p) ? "class='bft'" : ""; ?>><?= $i; ?></a>
                    <?php
                    }
                    ?>
                    <a href="?do=<?= $do; ?>&p=<?= $next; ?>">></a>
        </div>
    </fieldset>
</div>

<script>
    function great(good,id){
        $.post("./api/great.php",{good,id},()=>{
            location.reload();
        })
    }

    
        let news_title=$('.news_title');
        news_title.hover(function(){
            $(this).next().children().toggle();
        })
        let hidtext=$('.hidtext');
        hidtext.hover(function(){
            $(this).toggle();
        })
</script>