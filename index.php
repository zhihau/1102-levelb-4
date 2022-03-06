<?php include_once "base.php"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/js.js"></script>
<script src="./js/jquery-3.4.1.min.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./icon/0416.jpg">
            </a>
                        <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
if(isset($_SESSION['mem'])){
    echo "<a href='api/logout.php'>登出</a> |";
}else{
  echo "<a href='?do=login'>會員登入</a> |";
}
                ?>
                                
                                <a href="?do=admin">管理登入</a>
           </div>
           <marquee behavior="" direction="">情人節特惠活動&nbsp;&nbsp;年終特賣會開跑了</marquee>
        </div>
        <style>
            .menu{
                padding: 10px;
    background: lightyellow;
    border: 1px solid black;
            }
            .submenu{
background:lightgreen;
            }
        </style>
        <div id="left" class="ct">
        	<div style="min-height:400px;">

<?php
$all=$Goods->math('count','*');
echo "<div class='menu' onclick='show(0,0)'>全部商品 ($all)</div>";
$rows=$Type->all(['parent'=>0]);
foreach($rows as $row){
    $all=$Goods->math('count','*',['big'=>$row['id']]);
    echo "<div class='menu'>{$row['name']} ($all)";
    if($all>0){
    echo "<div style='display:none'>";
    $subs=$Type->all(['parent'=>$row['id']]);
    
    foreach($subs as $sub){
        $all=$Goods->math('count','*',['mid'=>$sub['id']]);
        echo "<div class='submenu' onclick='show({$row['id']},{$sub['id']})'>{$sub['name']} ($all)</div>";
    }
    echo "</div>";
}
    echo "</div>";
}
?>


        	            </div>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right">
                <?php
$do=$_GET['do']??'main';
$file='front/'.$do.'.php';
if(file_exists($file)){
include $file;
}else{
include 'front/main.php';
}
                ?>
        	        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct"><?=$Bottom->find(1)['bottom'];?></div>
    </div>
<script>
    $('.menu').hover(function(){
    $(this).find('>div').toggle();
})
function show(bid,mid){
    location.href="?do=main&bid="+bid+"&mid="+mid;
}
</script>
</body>


</html>