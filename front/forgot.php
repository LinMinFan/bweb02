<fieldset>
    <legend>忘記密碼</legend>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button onclick="findpw()">尋找</button></div>

</fieldset>
<script>
    function findpw() {
        
        $.get("./api/find_pw.php",{email:$("#email").val()},(result)=>{
            $("#result").html(result)
        })
    }
</script>