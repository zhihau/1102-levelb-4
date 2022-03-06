<?php
if(!isset($_SESSION['mem'])){
    to('?do=login');
    exit();
}


?>
<h1 class="ct"><?=$_SESSION['mem'];?>的購物車</h1>

<?php
if(!empty($_GET['id'])&&!empty($_GET['qt'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}else if(isset($_SESSION['cart'])&&empty($_SESSION['cart'])){
    echo "<h4>購物車中尚無商品</h4>";
  exit();   
}
?>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    

foreach($_SESSION['cart'] as $id=> $qt){
    $row=$Goods->find($id);
?>
    <tr class="pp">
        <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><input type="number" name="qt" value="<?=$qt;?>"></td>
        <td><?=$row['stock'];?></td>
        <td><?=$row['price'];?></td>
        <td><?=$row['price']*$qt;?></td>
        <td>
            <button onclick="delCart(<?=$row['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <a href="?do=main"><img src="icon/0411.jpg" alt=""></a>
    <a href="?do=check"><img src="icon/0412.jpg" alt=""></a>
</div>
<script>
    function delCart(id){
        $.post("api/del_cart.php",{id},function(){
            location.href='?do=buycart';
        })
    }
</script>