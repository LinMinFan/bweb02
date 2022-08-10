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
    <legend>忘記密碼</legend>
    <table class="w100 mg">
        <tr>
            <td class="w100">請輸入信箱以查找密碼</td>
        </tr>
        <tr>
            <td class="w100"><input style="width:400px;" type="text" name="" id="email"></td>
        </tr>
        <tr>
            <td class="w100" id="find_text"></td>
        </tr>
    </table>
    <div class="w90 mg">
        <button onclick="find_pw()">尋找</button>
    </div>
</fieldset>
</div>

<script>

    function find_pw(){
       let email=$('#email').val();
       $.post("./api/chk_email.php",{email},(res)=>{
        $('#find_text').text(res)
       })
    }


</script>