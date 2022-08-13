<fieldset class="w60 mg_at">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
    <table class="w100 mg_at">
        <tr>
            <td class="clo w10">編號</td>
            <td class="clo w60">標題</td>
            <td class="clo w10">顯示</td>
            <td class="clo w10">刪除</td>
        </tr>
        <?php
        $p=$_GET['p']??1;
        $counts=$$do->math('count','id');
        $div=3;
        $pages=ceil(($counts/$div));
        $start=($p-1)*$div;
        $pre=(($p-1)>0)?($p-1):1;
        $next=(($p+1)<=$pages)?($p+1):$pages;
        $datas=$$do->all(" limit $start,$div");
        foreach ($datas as $key => $data) {
                ?>
                    <tr>
                        <td class="w10 ct clo"><?=$key+1+$start;?>.</td>
                        <td class="w60"><?=$data['title'];?></td>
                        <td class="w10">
                            <input type="checkbox" name="sh[]" value="<?=$data['id'];?>" <?=($data['sh']==1)?"checked":"";?>>
                        </td>
                        <td class="w10">
                            <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                        </td>
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
    <div class="w100 ct">
        <span >
            <input type="submit" value="確定修改">
        </span>
    </div>
    </form>
    
</fieldset>

<script>
    function reg(acc,pw,pw2,email){
        if (acc=="" || pw=="" || pw2=="" || email=="" ) {
            alert("不可空白");
        }else if(pw != pw2){
            alert("密碼錯誤");
        }else {
            $.post("./api/reg.php",{acc,pw,email},(res)=>{
           alert(res);
           location.reload();
        })
        }
    }
</script>