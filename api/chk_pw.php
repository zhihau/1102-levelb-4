<?php

include_once "../base.php";

$DB=new DB($_GET['table']);
$chk=$DB->math('count','*',$_POST);
if($chk>0){
    echo 1;
    switch($_GET['table']){
        case "admin":
            $_SESSION['admin']=$_POST['acc'];
            
            $_SESSION['pr']=unserialize($DB->find($_POST)['pr']);
            break;
        case "mem":
            $_SESSION['mem']=$_POST['acc'];
            break;
    }
    
}else{
    echo 0;
}