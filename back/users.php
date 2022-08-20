<fieldset class="w80 mg">
    <legend>帳號管理</legend>
    <form action="./api/edit.php?do=<?= $do; ?>" method="post">
    <table class="w100">
        <tr>
            <td class="clo w40">帳號</td>
            <td class="clo w30">密碼</td>
            <td class="clo w20">刪除</td>
        </tr>
        <?php
            $uus=$$do->all();
            foreach ($uus as $key => $uu) {
                if ($uu['acc']!='admin') {
                    ?>
                    <tr>
                        <td class="ct w40"><?=$uu['acc'];?></td>
                        <td class="ct w30"><?=str_repeat("*",strlen($uu['pw']));?></td>
                        <td class="ct w20">
                            <input type="checkbox" name="del[]" value="<?=$uu['id'];?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$uu['id'];?>">
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
    <h3>新增會員</h3>
    <p class="red">*請設定您要註冊的帳號及密碼（最長 12 個字元）</p>
    <table class="w100">
        <tr>
            <td class="clo w50">Step1:登入帳號</td>
            <td class="w50">
                <input type="text" name="" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo w50">Step2:登入密碼</td>
            <td class="w50">
                <input type="password" name="" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo w50">Step3:再次確認密碼</td>
            <td class="w50">
                <input type="password" name="" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo w50">Step4:信箱(忘記密碼時使用)</td>
            <td class="w50">
                <input type="text" name="" id="email">
            </td>
        </tr>
    </table>
    <div class="ct w100 ">
        <span class="float_l">
            <button onclick="reg($('#acc').val(),$('#pw').val(),$('#pw2').val(),$('#email').val())">註冊</button>
            <button onclick="$('#acc').val(''),$('#pw').val(''),$('#pw2').val(''),$('#email').val('')">清除</button>
        </span>

    </div>
</fieldset>

<script>
    function reg(acc, pw, pw2, email) {
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else if (pw != pw2) {
            alert("密碼錯誤");
        } else {
            $.post("./api/reg.php", {
                acc,
                pw,
                email
            }, (res => {
                alert(res);
                $('#acc').val(''), $('#pw').val(''), $('#pw2').val(''), $('#email').val('');
                location.reload();
            }))
        }
    }
</script>