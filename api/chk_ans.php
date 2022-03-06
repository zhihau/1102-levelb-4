<?php

include_once "../base.php";

if($_SESSION['ans']==$_POST['ans']){
    echo 1;
}else{
    echo 0;
}