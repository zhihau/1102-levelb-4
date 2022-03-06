<?php
$mid=$_GET['mid']??0;
if($mid==0){
    echo "<h1>全部商品</h1>";
    $rows=$Goods->all();
}else{
    echo "<h1>".$Type->find(['id'=>$_GET['bid']])['name'];
    echo " > ";
    echo $Type->find(['id'=>$_GET['mid']])['name']."</h1>";
    $rows=$Goods->all(['big'=>$_GET['bid'],'mid'=>$_GET['mid']]);
}

foreach($rows as $row){
?>
<div style="display:flex;margin-bottom:10px">
   <div class="pp" style="width:40%">
   <a href="?do=detail&id=<?=$row['id'];?>"><img src="../img/<?=$row['img'];?>" width="300px"></a>
   
    </div>
   <div class="pp" style="width:60%">
    <div class="tt"><?=$row['name'];?></div>
    <div class="pp">價錢：<?=$row['price'];?><a href="?do=buycart&id=<?=$row['id'];?>&qt=1" style="float:right"><img src="icon/0402.jpg" alt=""></a></div>
    <div class="pp">規格：<?=$row['spec'];?></div>
    <div class="pp">簡介：<?=$row['intro'];?></div>
    </div>
   
</div>
<?php
}
?>

