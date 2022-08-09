<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class db{
    protected $table;
    protected $pdo;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=bweb02";

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
    }

    function to_str($array){
        $tmp=[];
        foreach ($array as $key => $value) {
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function find($id){
        $sql="SELECT * FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp=$this->to_str($id);
            $sql.=join(" && ",$tmp);
        }else {
            $sql.="`id`=".$id;
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp=$this->to_str($arg[0]);
                $sql.=" WHERE ".join(" && ",$tmp);
            }else {
                $sql.=$arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql.=$arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function del($id){
        $sql="DELETE FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp=$this->to_str($id);
            $sql.=join(" && ",$tmp);
        }else {
            $sql.="`id`=".$id;
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    function save($array){
        if (isset($array['id'])) {
            $tmp=$this->to_str($array);
            $sql="UPDATE $this->table SET ".join(" , ",$tmp)." WHERE `id`=".$array['id'];
        }else {
            $sql="INSERT INTO $this->table (`".join("`, `",array_keys($array))."`) VALUES ('".join("','",$array)."')";
        }
        //echo $sql
        return $this->pdo->exec($sql);
    }

    function math($math,$col,...$arg){
        $sql="SELECT $math($col) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp=$this->to_str($arg[0]);
                $sql.=" WHERE ".join(" && ",$tmp);
            }else {
                $sql.=$arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql.=$arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}

$total=new db('total');
$user=new db('user');
$log=new db('log');
$news=new db('news');
$que=new db('que');

$today=date("Y-m-d");
if (!isset($_SESSION['log'])) {
    $chk_d=$total->math('count','id',['date'=>$today]);
    if ($chk_d>0) {
        $dt=$total->find(['date'=>$today]);
        $dt['total']++;
    }else {
        $dt=['date'=>$today,'total'=>1];
    }
    $_SESSION['log']=1;
    $total->save($dt);
}

?>