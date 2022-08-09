# 題組二解題步驟

## 共同項目

### 預備時間

* 鍵盤、滑鼠、螢幕設備檢查
* xmpp安裝
* vscode安裝
* 題組資料備份
* 建立資料夾
* 測試localhost
* 建立base檔
* 資料庫連線測試
* 建立css資料夾
* 建立js資料夾
* 建立api資料夾

### 解題順序

* 整理檔案
    * 建立icon資料夾
    * 建立index.php
        * 共同功能完成後複製建立back.php
    * 修改css、js連結路徑
    * header&&footer可不抽出
    * 建立front資料夾抽出內容class=""區塊並給予一個名稱"content"
        * 建立main.php
        * 建立login.php
        * 建立po.php
        * 建立reg.php
        * 建立forgot.php

    * 建立back資料夾
        * 建立main.php

    * 建立sql資料表

        * user會員

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |acc|varchar|--|--|--|--|
        |pw|varchar|--|--|--|--|
        |email|varchar|--|--|--|--|

        * total訪客統計

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |date|date|--|--|--|--|
        |total|int|--|--|--|--|

        * news文章

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |title|text|--|--|--|--|
        |text|text|--|--|--|--|
        |type|int|--|--|--|--|
        |good|int|--|--|--|--|
        |sh|int|--|--|--|--|
        
        * que問卷

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |text|text|--|--|--|--|
        |count|int|--|--|--|--|
        |subject_id|int|--|--|--|--|

        * log 紀錄

        |名稱|類型|屬性|預設值|額外資訊|備註|
        |--|--|--|--|--|--|
        |id|int|UNSIGNED|--|AI|--|
        |news|int|--|--|--|--|
        |user|varchar|--|--|--|--|


* 建置網站標題區
    * 用session來紀錄使用者
        * 先判斷今日是否有資料沒有的話新增一筆
        * 有的話人數+1
        * 用sql的sum函式加總總瀏覽人數
    * id="title"加入回首頁float:right
        * date("m 月 d 號 l")函式顯示日期
    * id='title2'設定標題圖片

* 建置頁尾版權區
    * 更改年份及QR Code圖檔的連結路徑

* 建置會員登入/登出/註冊及忘記密碼功能
    * 使用 `<fieldset><legend></legend></fieldset>` 來產生群組外框標題字
    * api建立chk_acc.php
    * api建立chk_pw.php
    * table建立login.php畫面使用ajax不使用form表單
        * `function reset(){$('#acc,#pw').val("")};`

        * ```js
            function login(){
            let acc=$("#acc").val();
            let pw=$("#pw").val();
            $.post("./api/chk_acc.php",{acc},(res)=>{
                console.log('acc',res)
                if(parseInt(res)===1){
                    $.post("./api/chk_pw.php",{acc,pw},(res)=>{
                        console.log('pw',res)
                        if(parseInt(res)===1){
                            if(acc==='admin'){
                                location.href='back.php'
                            }else{
                                location.href='index.php'
                            }
                        }else{
                            alert("密碼錯誤");
                        }
                    })
                }else{
                    alert("查無帳號")
                }
                })
                }

        * 完成api/chk_acc.php 確認帳號
        * 完成api/chk_pw.php 確認帳號密碼
        * 登入成功建立$_SESSION

    * 建立reg.php畫面
        * `function reset(){$('#acc,#pw,#pw2,#email').val ("")};`

        * ```js
            function reg() {
                let user = {
                    acc: $("#acc").val(),
                    pw: $("#pw").val(),
                    pw2: $("#pw2").val(),
                    email: $("#email").val()
                }
                if (user.acc == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
                    alert("不可空白")
                } else if (user.pw != user.pw2) {
                    alert("密碼錯誤")
                } else {
                    $.get("./api/chk_acc.php", {
                        acc: user.acc
                    }, (res) => {
                        if (parseInt(res) == 1) {
                            alert("帳號重複")
                        } else {
                            $.post("./api/reg.php", user, (res) => {
                                alert("註冊完成，歡迎加入")
                                location.href = "?do=login"
                            })
                        }
                    })
                }
            }

        * 完成api/reg.php 新增會員資料

    * 建立forget.php畫面
        * ```js
            function mail(){
            $.post("api/find_pw.php",{email:$("#email").val()},(res)=>{
                $("#result").text(res)
            })
            }

        * 完成api/find_pw.php 查詢密碼

    * 建立logout.php 清除$_SESSION
        * ```js
            function logout(){
            $.get("api/logout.php",()=>{
                location.reload();
                })
            }    
    
    * 使用session判斷登入顯示功能並複製index.php建立back.php
        * back.php
            * ```php
                <?php
			    if(isset($_SESSION['user'])){
			    	if($_SESSION['user']==='admin'){
			    	?>
			    	歡迎，<?=$_SESSION['user'];?>
			    	<button onclick="location.href='back.php'">管理</button>
			    	|<button onclick='logout()'>登出</button>
			    	<?php
			    	}else{
			    ?>
			    歡迎，<?=$_SESSION['user'];?>
			    <button onclick='logout()'>登出</button>
			    <?php
			    }
			    }else{
			    ?>
			    <a href="?do=login">會員登入</a>
			    <?php	
			    }
			    ?>

        * indwx.php
            * ```php
                <?php
				if(isset($_SESSION['user'])){
					if($_SESSION['user']==='admin'){
					?>
					歡迎，<?=$_SESSION['user'];?>
					<button onclick="location.href='back.php'">管理</button>
					|<button onclick='logout()'>登出</button>
					<?php
					}else{
				?>
				歡迎，<?=$_SESSION['user'];?>
				<button onclick='logout()'>登出</button>
				<?php
				}
				}else{
				?>
				<a href="?do=login">會員登入</a>
				<?php	
				}
				?>

    * 建立後台帳號管理畫面
        * 建立ajax抓取資料庫資料
            * ```js
                $.get("./api/users.php",(users)=>{
                $("#users").html(users)
                })

        * 完成api/users.php 引入資料
            * ```php
                <?php
                include_once "../base.php";
                $users=$User->all();
                foreach($users as $user){
                echo "<tr>";
                echo "<td>{$user['acc']}</td>";
                echo "<td>".
                str_repeat("*",strlen($user['pw'])) .
                "</td>";
                echo "<td>";
                echo "<input type='checkbox' name='del[]' value='{$user['id']}'>";
                echo "</td>";
                echo "</tr>";
                }

        * 完成api/del_user.php 刪除資料
            * ```php
                <?php
                include_once "../base.php";
                if(!empty($_POST['del'])){
                foreach($_POST['del'] as $id){
                $User->del($id);
                }
                }

            * ```js
                function del(){
                let ids=new Array();
                $("table input[type='checkbox']:checked").each((idx,box)=>{
                ids.push($(box).val())
                })
                $.post("./api/del_user.php",{del:ids},()=>{
                $.get("./api/users.php",(users)=>{
                $("#users").html(users)
                })
                })
                }

            * 完成新增會員功能同註冊會員function

    * 建立文章管理的顯示及刪除功能 以form表單POST方式處理
        * 完成api/news.php
            * ```php
                <?php
                include_once "../base.php";
                if(isset($_POST['del'])){
                foreach($_POST['del'] as $id){
                $News->del($id);
                }
                }
                $rows=$News->all();
                foreach($rows as $row){
                if(in_array($row['id'],$_POST['sh'])){
                $row['sh']=1;
                }else{
                $row['sh']=0;
                }
                $News->save($row);
                }
                to("../back.php?do=news");

        * 文章管理的分頁功能
    
    * 建立後台新增問卷功能
        * 完成api/que.php
            * ```php
                <?php

                include_once "../base.php";
                if(!empty($_POST['subject'])){
                $Que->save(['text'=>$_POST['subject'],'count'=>0,'subject_id'=>0]);
                $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];
                if(!empty($_POST['option'])){
                foreach($_POST['option'] as $opt){
                $Que->save(['text'=>$opt,'count'=>0,'subject_id'=>$subject_id]);
                }
                }
                }
                to("../back.php?do=que");

            * ```js
                function more(){
                let opt=`<div>選項<input type="text" name="option[]"></div>`
                $("#options").append(opt)
                }

        * 建立sql que資料表

    * 使用dreamweaver來製作主題內容頁
        * Html檔->插入->Spry->標籤面版並貼入內容
        * 建立分類網誌基本外觀及點擊功能
            * ```js
                $(".type").on("click",function(){
                let type=$(this).text()
                $("#header").text(type)
                })

        * 建立api/get_list.php
            * ```php
                <?php
                include_once "../base.php";
                $array=[ "健康新知"=>"1", "菸害防制"=>"2", "癌症防治"=>"3", "慢性病防治"=>"4", ];
                $type=$array[$_GET['type']];
                $rows=$News->all(['type'=>$type]);
                foreach($rows as $row){
                echo "<a href='javascript:getNews({$row['id']})' style='display:block'>";
                echo $row['title'];
                echo "<a>";
                }

        * 建立api/get_news.php
            * ```php
                <?php
                include_once "../base.php";
                $id=$_GET['id'];
                $news=$News->find($id);
                echo nl2br($news['text']);```

        * 完成po.php function 分類網誌
            * ```js
                getList('健康新知');
                $(".type").on("click",function(){
                let type=$(this).text()
                $("#header").text(type)
                    (type);
                })
                function getList(type){
                $.get("./api/get_list.php",{type},(list)=>{
                $("#content").html(list)
                })
                }
                function getNews(id){
                $.get("./api/get_news.php",{id},(news)=>{
                $("#content").html(news)
                })
                }

    * 建立front/news.php畫面內容 最新文章 / 人氣文章架構相同一併處理
        * 完成列表顯示 分頁功能
        * 人氣文章 依人氣排序
        * 建立點擊function 顯示完整內容
            * ```js
                $(".title").on("click",function(){
                $(this).next().children().toggle()
                })

        * 彈出視窗功能
            * ```js
                $(".title,.pop").hover(
                function (){
                $(this).parent().find('.modal').show()
                },
                function (){
                $(this).parent().find('.modal').hide()
                }
                )

        * 登入後可以按讚功能 / 讚數加1 /收回讚功能 不重複按讚
            * ```php
                <?php 
                if(isset($_SESSION['user'])){
                    echo "<a class='great' href='#'>讚</a>";
                }

            * ```js
                $(".great").on("click",function(){
                let type=$(this).text()
                let num=parseInt($(this).siblings('span').text())
                let id=$(this).data('id')
                $.post('./api/good.php',{id,type},()=>{
                if(type==='讚'){
                $(this).text('收回讚')
                $(this).siblings('span').text(num+1)
                }else{
                $(this).text('讚')
                $(this).siblings('span').text(num-1)
                }
                })
                })

            * ```php
                $news=$News->find($id);
                    switch($type){
                    case '讚':
                    $news['good']++;
                $Log->save(['news'=>$id,'user'=>$_SESSION['user']]);
                break;
                case '收回讚':
                $news['good']--;
                $Log->del(['news'=>$id,'user'=>$_SESSION['user']]);
                break;
                }

    * 建立問卷列表畫面 / 判斷是否登入 
        * ```php
            <?php
                if(!isset($_SESSION['user'])){
                    echo "請先登入";
                    }else{
                    echo "<a href='?do=vote&id={$subject['id']}'>參與投票</a>";
                }
    
    * 建立投票 畫面 / 功能
        * ```php
            <?php
            include_once "../base.php";
            $opt=$_POST['opt'];
            $option=$Que->find($opt);
            $option['count']++;
            $Que->save($option);
            $subject=$Que->find($option['subject_id']);
            $subject['count']++;
            $Que->save($subject);
            to("../index.php?do=result&id=".$subject['id']);

        * 顯示投票結果