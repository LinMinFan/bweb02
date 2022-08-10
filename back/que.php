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
<fieldset class="w90 mg">
    <legend>新增問卷</legend>
    <form action="./api/edit.php?do=<?=$_GET['do'];?>" method="post">
    <table class="w100 mg mtb">
        <tr>
            <td class="w20 clo">問卷名稱</td>
            <td><input type="text" name="title" ></td>
        </tr>
        <tr>
            <td class="w40 clo">
                <label>選項</label>
                <input type="text" name="opt[]">
                <input type="button" value="更多" id="addopt">
            </td>
            <td>
            </td>
            
        </tr>
        
    </table>
    
    <div><input type="submit" value="新增"><input type="reset" value="清空"></div>
    </form>
    
    <script>
        $('#addopt').on('click',function(){
            $(this).before("<br><label>選項</label><input type='text' name='opt[]'>")
        })
    </script>