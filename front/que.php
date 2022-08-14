<fieldset class="w80 mg">
    <legend>「目前位置: 首頁 > 問卷調查 </legend>
        <table class="w100">
            <tr>
                <td class="w5 ct">編號</td>
                <td class="w60">問卷題目</td>
                <td class="w10 ct">投票總數</td>
                <td class="w5 ct">結果</td>
                <td class="w10 ct">狀態</td>
            </tr>
            <?php
                foreach ($que->all(['parent'=>0]) as $key => $subject) {
                    ?>
                        <tr>
                            <td class="w5 ct"><?=$key+1;?>.</td>
                            <td class="w60"><?=$subject['text'];?></td>
                            <td class="w10 ct"><?=$subject['count'];?></td>
                            <td class="w5 ct">
                            <a href="?do=result&id=<?=$subject['id'];?>">結果</a>    
                            </td>
                            <td class="w10 ct">
                                <?php
                                    if (isset($_SESSION['acc'])) {
                                        ?>
                                            <a href="?do=vote&id=<?=$subject['id'];?>">參與投票</a>
                                        <?php
                                    }else {
                                        echo "請先登入";
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
   

</script>