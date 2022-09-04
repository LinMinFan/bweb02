<fieldset class="w60 mg">
<legend>帳號管理</legend>
<form action="./api/edit.php?do=<?=$do;?>" method="post">
<table class="w100">
    <tr>
        <td class="clo w40">帳號</td>
        <td class="clo w30">密碼</td>
        <td class="clo w20">刪除</td>
    </tr>
    <?php
    foreach ($$do->all() as $key => $data) {
        if ($data['acc']!='admin') {
            ?>
            <tr>
                <td class="clo w40"><?=$data['acc'];?></td>
                <td class="clo w30"><?=$data['pw'];?></td>
                <td class="clo w20">
                    <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                    <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<div class="ct">
    <input type="submit" value="確定刪除">
    <input type="reset" value="清空選取">
</div>
</form>

<h4>新增會員</h4>
<div style="color: #f00;">*請設定您要註冊的帳號及密碼（最長 12 個字元）</div>
<table class="w100">
    <tr>
        <td class="w45 clo">Step1:登入帳號</td>
        <td>
            <input type="text" name="" id="acc">
        </td>
    </tr>
    <tr>
        <td class="w45 clo">Step2:登入密碼</td>
        <td>
            <input type="password" name="" id="pw">
        </td>
    </tr>
    <tr>
        <td class="w45 clo">Step3:再次確認密碼</td>
        <td>
            <input type="password" name="" id="pw2">
        </td>
    </tr>
    <tr>
        <td class="w45 clo">Step4:信箱(忘記密碼時使用)</td>
        <td>
            <input type="text" name="" id="email">
        </td>
    </tr>
</table>
<div class="ct">
    <span class="float_l">
    <button onclick="res($('#acc').val(),$('#pw').val(),$('#pw2').val(),$('#email').val())">註冊</button>
    <button onclick="reload()">清除</button>
    </span>
</div>
</fieldset>
<script>
    function res(acc,pw,pw2,email){
        if (acc=='' || pw=='' || pw2=='' || email=='') {
            alert("不可空白");
        }else if(pw!=pw2){
            alert("密碼錯誤");
        }else{
            $.post("./api/res.php",{acc,pw,email},(res)=>{
                alert(res);
                reload();
            })
        }
    }
</script>