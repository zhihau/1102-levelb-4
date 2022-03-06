<?php

$id=$_GET['id'];
$row=$Goods->find($id);
$type=$Type->find(['id'=>$row['big']])['name'];
$type.=">";
$type.=$Type->find(['id'=>$row['mid']])['name'];
?>
<h1 class="ct"><?=$row['name'];?></h1>
<div style="display:flex;margin-bottom:10px" class="pp">
   <div  style="width:40%">
   <img src="../img/<?=$row['img'];?>" width="100%">
   
    </div>
   <div  style="width:60%">
    <div>分類：<?=$type;?></div>
    <div>編號：<?=$row['no'];?></div>
    <div >價格：<?=$row['price'];?></div>
    <div >規格：<?=$row['spec'];?></div>
    <div >簡介：<?=$row['intro'];?></div>
    </div>
   
</div>
<div class="ct tt">購買數量：<input type="number" name="qt" id="qt"><a href="#" onclick="buy(<?=$row['id'];?>)"><img src="icon/0402.jpg" alt=""></a></div>
<div class="ct"><button onclick="location.href='?do=main'">返回</button></div>
<script>
    function buy(id){
        qt=$('#qt').val()
        location.href="?do=buycart&id="+id+"&qt="+qt;

    }
</script>