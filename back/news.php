<form action="./api/news.php" method="POST">
    <table class="tab cent ct">
        <tr>
            <th style="width:15%;">編號</th>
            <th style="width:55%;">標題</th>
            <th style="width:15%;">顯示</th>
            <th>刪除</th>
        </tr>
     <?php
      $p=$_GET['p']??1;
      $allns=$news->math('count','id');
      $div=3;
      $pages=ceil($allns/$div);
      $start=($p-1)*$div;
      $pre=($p-1 > 0)?$p-1:1;
      $next=($p+1<=$pages)?$p+1:$pages;
      $rows = $news->all(" limit $start,$div");
     foreach ($rows as $key => $row) {
        ?>
        <tr>
                <td><?= ($start+$key+1); ?></td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=($row['sh']==1)?"checked":"";?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
        </tr>
        <?php
     }
     ?>
    </table>
    <div class="cent ct">
        <a href="?do=<?=$do;?>&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages ; $i++) { 
        ?>
        <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"style='font-size:20px'":"";?>><?=$i;?></a>
        <?php
        }
        ?>
        <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
    <div class="cent ct">
        <input type="submit" value="確定修改">
    </div>
</form>