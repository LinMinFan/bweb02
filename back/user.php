<fieldset class="w60 mg_at">
    <legend>帳號管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
    <table class="w100 mg_at">
        <tr>
            <td class="clo w45">帳號</td>
            <td class="clo w45">密碼</td>
            <td class="clo">刪除</td>
        </tr>
        <?php
        $datas=$$do->all();
        foreach ($datas as $key => $data) {
            if ($data['acc'] !="admin") {
                ?>
                    <tr>
                        <td ><?=$data['acc'];?></td>
                        <td ><?=str_repeat("*",strlen($data['pw']));?></td>
                        <td >
                            <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                    </tr>
                <?php
            }
        }
        ?>
    </table>
    
    <div class="w100 ct">
        <span >
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </span>
    </div>
    </form>
    <h3>新增會員</h3>
    <p class="red">*請設定您要註冊的帳號及密碼（最長 12 個字元）</p>
    <table class="w100 mg_at">
        <tr>
            <td class="clo w45">
                <span>Step1:登入帳號</span>
            </td>
            <td class="w45">
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo w45">
                <span>Step2:登入密碼</span>
            </td>
            <td class="w45">
                <input type="password" name="" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo w45">
                <span>Step3:再次確認密碼</span>
            </td>
            <td class="w45">
                <input type="password" name="" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo w45">
                <span>Step4:信箱(忘記密碼時使用)</span>
            </td>
            <td class="w45">
                <input type="text" name="" id="email">
            </td>
        </tr>
       
    </table>
    <div class="w100">
        <span class="float_l"><button onclick="reg($('#acc').val(),$('#pw').val(),$('#pw2').val(),$('#email').val())">註冊</button> <button onclick="$('#acc').val(''),$('#pw').val(''),$('#pw2').val(''),$('#email').val('')">清除</button></span>
    </div>
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