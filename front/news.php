<div class="w100">
    <fieldset class="w80 mg">
        <legend>目前位置：首頁 > 最新文章區</legend>
        <table class="w100">
            <tr>
                <td class="w20">標題</td>
                <td class="w60">內容</td>
                <td class="w10"></td>
            </tr>
            <?php
            $p = $_GET['p'] ?? 1;
            $counts = $$do->math('count', 'id', ['sh' => 1]);
            $div = 5;
            $pages = ceil(($counts / $div));
            $start = ($p - 1) * $div;
            $pre = (($p - 1) > 0) ? ($p - 1) : 1;
            $next = (($p + 1) <= $pages) ? ($p + 1) : $pages;
            $datas = $$do->all(['sh' => 1], " limit $start,$div");
            foreach ($datas as $key => $data) {
            ?>
                <tr>
                    <td class="w30 clo news_title"><?=$data['title'];?></td>
                    <td class="w60 news_content">
                        <span><?=mb_substr($data['text'],0,10);?>...</span>
                        <span style="display:none;"><?=$data['text'];?></span>
                    </td>
                    <td class="w10">
                        <?php
                            if (isset($_SESSION['acc'])) {
                                if (($log->math('count','id',['news'=>$data['id'],'user'=>$_SESSION['acc']]))>0) {
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
        news_title.on('click',function(){
            $(this).next().children().toggle();
        })
</script>