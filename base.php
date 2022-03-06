<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=web04";
    private $root="root";
    private $pw="";
    private $pdo;
    public $table="";
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->root,$this->pw);
        
    }
    private function jon($arg){
        $sql="";
        if(is_array($arg)){
            foreach($arg as $k=>$v){
                $tmp[]="`$k`='$v'";
            }
            $sql.="where ".join(" and ",$tmp);
        }else{
            $sql.="where `id`='$arg'";
        }
        return $sql;
    }
    private function chk($arg){
        $sql="";
        if(!empty($arg[0])){
            if(is_array($arg[0])){
                $sql.=$this->jon($arg[0]);
            }else{
                $sql.=$arg[0];
            }
        }
        if(!empty($arg[1])){
            $sql.=" ".$arg[1];
        }
        return $sql;
    }

    public function all(...$arg){
        $sql="select * from $this->table ";
        $sql.=$this->chk($arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";
        $sql.=$this->chk($arg);
        return $this->pdo->query($sql)->fetchColumn();

    }
    public function find($arg){
        $sql="select * from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($arg){
        $sql="delete from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->exec($sql);
    }
    public function q($arg){
return $this->pdo->query($arg)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save($arg){
        $sql="";
        if(!empty($arg['id'])){
            foreach($arg as $k=>$v){
            if($k!='id')
                $tmp[]="`$k`='$v'";
            }
            $sql.=sprintf("update %s set %s where `id`='%s'",$this->table,join(",",$tmp),$arg['id']);
        }else{
            $sql.=sprintf("insert into %s (`%s`) values ('%s')",$this->table,join("`,`",array_keys($arg)),join("','",$arg));
        }
        return $this->pdo->exec($sql);
    }
}
 function dd($arg){
echo "<pre>";
print_r($arg);
echo "</pre>";
}
 function to($arg){
     header("location:".$arg);

}
$Admin=new DB('admin');
$Mem=new DB('mem');
$Ord=new DB('ord');
$Type=new DB('type');
$Goods=new DB('goods');
$Bottom=new DB('bottom');

// if(!isset($_SESSION['total'])){
//     $total=$Total->find(1);
//     $total['total']++;
//     $Total->save($total);
//     $_SESSION['total']=$total['total'];
// }

// all math find del q save
// echo $Admin->save(['acc'=>'test']);
// dd($Admin->all());
// $id=$Admin->math('max','id');
// echo $Admin->save(['id'=>$id,'acc'=>'test9']);
// dd($Admin->find(['id'=>$id]));

// echo $Admin->del($id);
// dd($Admin->q("select * from admin"));

// 測試管理員帳號
// $admin['pw']="1234";
// $admin['acc']="admin";
// $admin=$Admin->find(['acc'=>'admin','pw'=>'1234']);
// $admin['pr']=serialize([1,2,3,4,5]);
// echo "新增管理員帳號：".$Admin->save($admin);

