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
<fieldset class="w80 mg">
    <legend>帳號管理</legend>
    <form action="./api/edit.php?do=<?=$_GET['do'];?>" method="post">
    <table class="w100 mg">
        <tr>
            <td class="w50">帳號</td>
            <td class="w30">密碼</td>
            <td class="w20">刪除</td>
        </tr>
        <?php
            $datas=$$do->all();
            foreach ($datas as $key => $data) {
                if ($data['acc'] != "admin") {
                ?>
                <tr>
                <td class="w50"><?=$data['acc'];?></td>
                <td class="w30"><?=str_repeat("*",strlen($data['pw']));?></td>
                <td class="w20"><input type="checkbox" name="del[]" value="<?=$data['id'];?>"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$data['id'];?>">
                <?php
                }
            }
        ?>
    </table>
    <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
    </form>
    <h1>新增會員</h1>
    <p style="color:#f00">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table class="w100 mg">
        <tr>
            <td class="clo w50">Step1：登入帳號</td>
            <td class="w50"><input type="text" name="" id="acc"></td>
        </tr>
        <tr>
            <td class="clo w50">Step2：登入密碼</td>
            <td class="w50"><input type="password" name="" id="pw"></td>
        </tr>
        <tr>
            <td class="clo w50">Step3：再次確認密碼</td>
            <td class="w50"><input type="password" name="" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo w50">Step4：信箱(忘記密碼時使用)</td>
            <td class="w50"><input type="text" name="" id="email"></td>
        </tr>
    </table>
    <div class="w90 mg">
        <button onclick="reg()">新增</button>
        <button onclick="cl()">清除</button>
    </div>
</fieldset>
</div>

<script>
    function cl(){
        $('#acc').val("");
        $('#pw').val("");
        $('#pw2').val("");
        $('#email').val("");
    }
    function reg(){
       let acc=$('#acc').val();
       let pw=$('#pw').val();
       let pw2=$('#pw2').val();
       let email=$('#email').val();
       if (acc=="" || pw=="" || pw2=="" || email=="") {
        alert("不可空白");
       }else if(pw != pw2){
        alert("密碼錯誤");
       }else {
        $.post("./api/reg.php",{acc,pw,email},(res)=>{
            if (res>0) {
                alert("帳號重複");
            }else {
                alert("註冊完成，歡迎加入");
                cl();
            }
        })
       }
       
    }


</script>