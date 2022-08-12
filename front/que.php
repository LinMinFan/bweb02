<div class="w100">
    <fieldset class="w80 mg">
        <legend>目前位置：首頁 > 問卷調查</legend>
        <table class="w100">
            <tr>
                <td class="w5">編號</td>
                <td class="w70">問卷題目</td>
                <td class="w10">投票總數</td>
                <td class="w5">結果</td>
                <td class="w10">狀態</td>
            </tr>
            <?php
            $datas = $$do->all(['parent' => 0]);
            foreach ($datas as $key => $data) {
            ?>
                <tr>
                    <td class="w5"><?=$key+1;?>.</td>
                    <td class="w70"><?=$data['text'];?></td>
                    <td class="w10"><?=$data['count'];?></td>
                    <td class="w5"><a href="?do=result&id=<?=$data['id'];?>">結果</a></td>
                    <td class="w10">
                        <?php
                            if (isset($_SESSION['acc'])) {
                                ?>
                                    <a href="?do=vote&id=<?=$data['id'];?>">參加投票</a>
                                <?php
                            }else{
                                ?>
                                    <span>請先登入</span>
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