<?php
$subject=$que->find($_GET['id']);
$opts=$que->all(['subject_id'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置：首頁>問券調查><span><?=$subject['text'];?></span></legend>

    <h3><?=$subject['text'];?></h3>

    <?php
            foreach($opts as $opt){
                $sum=($subject['count']==0)?1:$subject['count'];
                $width=round($opt['count']/$sum,2)*100;
                $background=($width==0)?'#fff':'#ccc';
                echo "<div style='display:flex;align-items:center'>";
                echo "<div style='width:50%'>";
                echo $opt['text'];
                echo "</div>";
                echo "<div style='width:50%;display:flex:'>";
                echo "<div style='min-width:max-content;width:{$width}%;background:{$background};height:25px;text-align:center'>";
                echo $opt['count']."票({$width}%)";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
    
    