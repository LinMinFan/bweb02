<style>
    .out_box {
        width: 80%;
        margin: 0 auto;
    }

    .row_box {
        display: flex;
        width: 100%;
    }
    .row_box div{
        margin: 5px;
    }
</style>
<div>
    <span>
        目前位置：首頁>分類網誌><span class="menu_title">問卷調查</span>
    </span>
</div>

    <div class="out_box" style="width:100%;">
        <div class="row_box">
            <div class="ct" style="width:5%;">編號</div>
            <div class="ct" style="width:65%;">問券題目</div>
            <div class="ct" style="width:10%;">投票總數</div>
            <div class="ct" style="width:5%;">結果</div>
            <div class="ct" style="width:10%;">狀態</div>
        </div>
        <?php
        $qqs = $$do->all(['parent'=>0]);
        foreach ($qqs as $key => $qq) {
        ?>
                <div class="row_box">
                    <div class="ct" style="width:5%;"><?=($key+1);?>.</div>
                    <div style="width:65%;"><?=$qq['text'];?></div>
                    <div class="ct" style="width:10%;"><?=$qq['count'];?></div>
                    <div style="width:5%;"><a href="?do=result&id=<?=$qq['id'];?>">結果</a></div>
                    <div style="width:10%;">
                    <?php
                    if (isset($_SESSION['acc'])) {
                    ?>
                    <a href="?do=vote&id=<?=$qq['id'];?>">參與投票</a>
                    <?php
                    }else {
                    ?>
                    <span>請先登入</span>                
                    <?php
                    }
                    ?>
                    </div>
                </div>
        <?php
        }
        ?>
    </div>
    
