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
<fieldset class="w60 mg">
    <legend>會員登入</legend>
    <table class="w100 mg">
        <tr>
            <td class="clo w50">帳號</td>
            <td class="w50"><input type="text" name="" id="acc"></td>
        </tr>
        <tr>
            <td class="clo w50">密碼</td>
            <td class="w50"><input type="password" name="" id="pw"></td>
        </tr>
    </table>
    <div class="w90 mg">
        <button onclick="login()">登入</button>
        <button onclick="reset()">清除</button>
        <span style="float:right;"><a href="?do=forgot">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></span>
    </div>
</fieldset>
</div>

<script>
    function reset(){
        $('#acc').val("")
        $('#pw').val("")
    }
    function login(){
       let acc=$('#acc').val();
       let pw=$('#pw').val();
       $.post("./api/chk_acc.php",{acc},(chk_acc)=>{
        if (chk_acc==1) {
            $.post("./api/chk_pw.php",{acc,pw},(res)=>{
                if (res==1) {
                    if (acc=="admin") {
                        location.href="./back.php";
                    }else {
                        location.href="./index.php";
                    }
                }else {
                    alert("密碼錯誤")
                }
            })
        }else{
            alert("查無帳號")
        }
       })
    }


</script>