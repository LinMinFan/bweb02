<style>
    .outside{
        width: 80%;
        display: flex;
        justify-content: center;
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
<fieldset class="w90 mg">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?=$_GET['do'];?>" method="post">
    <table class="w100 mg">
        <tr>
            <td class="w10">編號</td>
            <td class="w60">標題</td>
            <td class="w10">顯示</td>
            <td class="w10">刪除</td>
        </tr>
        <?php
            $p=$_GET['p']??1;
            $counts=$$do->math('count','id');
            $div=3;
            $pages=ceil($counts/$div);
            $start=($p-1)*$div;
            $pre=(($p-1)>0)?($p-1):1;
            $next=(($p+1)<=$pages)?($p+1):$pages;
            $datas=$$do->all(" limit $start,$div");
            foreach ($datas as $key => $data) {
                ?>
                <tr>
                <td class="w10 clo"><?=$key+1+$start;?>.</td>
                <td class="w60"><?=$data['title'];?></td>
                <td class="w10"><input type="checkbox" name="sh[]" value="<?=$data['id'];?>" <?=($data['sh']==1)?"checked":"";?>></td>
                <td class="w10"><input type="checkbox" name="del[]" value="<?=$data['id'];?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$data['id'];?>">
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
    <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
    
    