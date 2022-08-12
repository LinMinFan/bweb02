<div class="w100">
    <fieldset class="w60 mg">
        <legend>帳號管理</legend>
        <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="w100">
            <tr>
                <td class="clo w40 ct">帳號</td>
                <td class="clo w30 ct">密碼</td>
                <td class="clo w10 ct">刪除</td>
            </tr>
            <?php
                $datas=$$do->all();
                foreach ($datas as $key => $data) {
                    if ($data['acc'] != "admin") {
                        ?>
                            <tr>
                                <td class="w40 ct"><?=$data['acc'];?></td>
                                <td class="w30 ct"><?=str_repeat("*",strlen($data['pw']));?></td>
                                <td class="w10 ct"><input type="checkbox" name="del[]" value="<?=$data['id'];?>"></td>
                                <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
        <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
        </form>
        <h3>新增會員</h3>
        <p style="color: #f00;">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
        <table class="w100">
            <tr>
                <td class="clo w50">Step1:登入帳號</td>
                <td ><input type="text" name="" id="acc"></td>
            </tr>
            <tr>
                <td class="clo w50">Step2:登入密碼</td>
                <td ><input type="password" name="" id="pw"></td>
            </tr>
            <tr>
                <td class="clo w50">Step3:再次確認密碼</td>
                <td ><input type="password" name="" id="pw2"></td>
            </tr>
            <tr>
                <td class="clo w50">Step4:信箱(忘記密碼時使用)</td>
                <td ><input type="text" name="" id="email"></td>
            </tr>
        </table>
        <div>
            <button onclick="reg()">註冊</button>
            <button onclick="$('#acc').val('');$('#pw').val('');$('#pw2').val('');$('#email').val('')">清除</button>
            
        </div>
    </fieldset>
</div>

<script>
function reg(){
    let acc=$('#acc').val();
    let pw=$('#pw').val();
    let pw2=$('#pw2').val();
    let email=$('#email').val();
    if (acc=="" || pw=="" || pw2=="" || email=="" ) {
        alert("不可空白");
    }else {
        if (pw != pw2) {
            alert("密碼錯誤");
        }else {
            $.post("./api/chk_acc.php",{acc},(res)=>{
                if (res==1) {
                    alert("帳號重複");
                }else {
                    $.post("./api/reg.php",{acc,pw,email},(res)=>{
                        alert("註冊完成，歡迎加入");
                        location.reload();
                    })
                }
            })
        }
    }
    
}

</script>