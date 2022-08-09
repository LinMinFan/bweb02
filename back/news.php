<style>
    .out_box {
        width: 80%;
        margin: 0 auto;
    }

    .row_box {
        display: flex;
        width: 100%;
    }
</style>
<fieldset style="width:80%;margin:0 auto;">
    <legend>最新文章管理</legend>
    <form action="./api/edit_news.php" method="post">
    <div class="out_box" style="width:100%;">
        <div class="row_box">
            <div class="ct" style="width:6%;">編號</div>
            <div class="ct" style="width:65%;">標題</div>
            <div class="ct" style="width:10%;">顯示</div>
            <div class="ct" style="width:10%;">刪除</div>
        </div>
        <?php
        $p=$_GET['p']??1;
        $countall=$$do->math('count','id');
        $div=3;
        $pages=ceil($countall/$div);
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $nns = $$do->all(" limit $start,$div");
        foreach ($nns as $key => $nn) {
        ?>
                <div class="row_box">
                    <div class="clo ct" style="width:6%;margin:5px"><?=($key+1+$start);?>.</div>
                    <div style="width:65%;"><?=$nn['title'];?></div>
                    <div style="width:10%;"><input type="checkbox" name="sh[]" value="<?=$nn['id'];?>" <?=($nn['sh']==1)?"checked":"";?>></div>
                    <div style="width:10%;"><input type="checkbox" name="del[]" value="<?=$nn['id'];?>" ></div>
                    <input type="hidden" name="id[]" value="<?=$nn['id'];?>">
                </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <a href="?do=news&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages ; $i++) { 
        ?>
            <a href="?do=news&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
        <?php
        }
        ?>
        <a href="?do=news&p=<?=$next;?>">></a>
    </div>
    <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
   </fieldset>