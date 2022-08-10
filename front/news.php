<style>
    .outside{
        width: 80%;
        display: flex;
        justify-content: center;
    }
    .block{
        display: block;
    }
    .flex{
        display: flex;
    }
    .flex_c{
        display: flex;
        justify-content: center;
    }
    .flex_a{
        display: flex;
        justify-content: space-around;
    }

    .w5{
        width: 5%;
    }
    .w10{
        width: 10%;
    }
    .w20{
        width: 20%;
    }
    .w35{
        width: 35%;
    }
    .w40{
        width: 40%;
    }
    .w50{
        width: 50%;
    }
    .w60{
        width: 60%;
    }
    .w70{
        width: 70%;
    }
    .w80{
        width: 80%;
    }
    .w90{
        width: 90%;
    }
    .w100{
        width: 100%;
    }

    .mg{
        margin: 0 auto;
    }

</style>
<div class="outside w100 mg">
<fieldset class="w100 mg">
    <legend>目前位置: 首頁 > 最新文章區 </legend>
    <table class="w90 mg">
        <tr>
            <td class="w35">標題</td>
            <td class="w35">內容</td>
            <td class="w20"></td>
        </tr>
        <?php
        $p=$_GET['p']??1;
        $counts=$$do->math('count','id');
        $div=5;
        $pages=ceil($counts/$div);
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $datas=$$do->all(['sh'=>1]," limit $start,$div");
        foreach ($datas as $key => $data) {
        ?>
        <tr>
            <td class="w35 clo news_box"><?=$data['title'];?></td>
            <td class="w35">
                <span><?=mb_substr($data['text'],0,10);?>...</span>
                <span style="display:none;"><?=$data['text'];?></span>
            </td>
            <td class="w20 ct">
                <?php
                if (isset($_SESSION['acc'])) {
                    if($log->math('count','id',['user'=>$_SESSION['acc'],'news'=>$data['id']])>0){
                        ?>
                            <a href="javascript:good(<?=$data['id'];?>,'收回讚')" class="agood">收回讚</a>
                        <?php
                    }else {
                        ?>
                            <a href="javascript:good(<?=$data['id'];?>,'讚')" class="agood">讚</a>
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
</div>

<script>
$('.news_box').on('click',function(){
    $(this).next().children().toggle();
})

function good(id,good){
    $.post("./api/good.php",{id,good},()=>{
        location.reload();
    })
}

</script>