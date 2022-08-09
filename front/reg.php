<div style="width:70%;margin:0 auto;border:1px solid #000;">
    <fieldset>
        <legend>會員註冊</legend>
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
        <div><button onclick="reg()">註冊</button><button onclick="reset()">清除</button></div>
    </fieldset>
</div>
<script>
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
                            alert("註冊完成，歡迎加入");
                            location.href="?do=login";
                        })
                    }
                })
            }

        }

    }
</script>