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
    <legend>帳號管理</legend>
    <div class="out_box" style="width:100%;">
        <div class="row_box">
            <div style="width:45%;">帳號</div>
            <div style="width:45%;">密碼</div>
            <div >刪除</div>
        </div>
        <?php
        $uus = $$do->all();
        foreach ($uus as $key => $uu) {
            if ($uu['acc'] != "admin") {
        ?>
                <div class="row_box">
                    <div style="width:45%;"><?=$uu['acc'];?></div>
                    <div style="width:45%;"><?=str_repeat("*",strlen($uu['pw']));?></div>
                    <div ><input type="checkbox" name="del" value="<?=$uu['id'];?>" ></div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="ct"><button onclick="del()">確定刪除</button><button onclick="$('.row_box input').prop('checked',false)">清空選取</button></div>
    
    <h3>新增會員</h3>
    <p style="color:#f00">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
        <table style="width:100%;">
            <tr>
                <td class="clo">Setp1：登入帳號</td>
                <td>
                    <input type="text" name="acc" id="acc">
                </td>
            </tr>
            <tr>
                <td class="clo">Setp2：登入密碼</td>
                <td>
                    <input type="password" name="pw" id="pw">
                </td>
            </tr>
            <tr>
                <td class="clo">Setp3：再次確認密碼</td>
                <td>
                    <input type="password" name="pw2" id="pw2">
                </td>
            </tr>
            <tr>
                <td class="clo">Setp4：信箱(忘記密碼時使用)</td>
                <td>
                    <input type="text" name="email" id="email">
                </td>
            </tr>
        </table>
        <div><button onclick="reg()">新增</button><button onclick="reset()">清除</button></div>
</fieldset>

<script>
    function del(){
        let ids=new Array();
        if ($('input:checked').length > 0) {
            $('input:checked').each((key,box)=>{
                ids.push($(box).val())
            })
            $.post("./api/del.php",{ids},()=>{
                location.reload();
            })
        }
    }


    function login() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post("./api/chk_acc.php", {
            acc
        }, (chk_acc) => {
            if (chk_acc == 1) {
                $.post("./api/chk_pw.php", {
                    acc,
                    pw
                }, (chk) => {
                    if (chk == 1) {
                        if (acc == "admin") {
                            location.href = "./back.php";
                        } else {
                            location.href = "./index.php";
                        }
                    } else {
                        alert("密碼錯誤")
                    }
                })
            } else {
                alert("查無帳號")
            }
        })
    }

    function reset() {
        $('#acc').val("");
        $('#pw').val("");
        $('#pw2').val("");
        $('#email').val("");
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else {
            if (pw != pw2) {
                alert("密碼錯誤");
            } else {
                $.post("./api/chk_acc.php", {
                    acc
                }, (res) => {
                    if (res == 1) {
                        alert("帳號重複")
                    } else {
                        $.post("./api/reg.php", {
                            acc,
                            pw,
                            email
                        }, () => {
                            location.href="?do=user";
                        })
                    }
                })
            }

        }

    }
</script>