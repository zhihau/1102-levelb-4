<?php
$row=$Mem->find(['acc'=>$_SESSION['mem']]);
// dd($_SESSION['mem']);
?>
<h1 class="ct">填寫資料</h1>
<table class="all">
    <tr>
        <td class="tt">登入帳號</td>
        <td class="pp"><?=$row['acc'];?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp">
            <input type="text" name="name" value="<?=$row['name'];?>">
            </td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" value="<?=$row['email'];?>">
            </td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp">
            <input type="text" name="addr" value="<?=$row['addr'];?>">
            </td>
    </tr>
    <tr>
        <td class="tt">連絡電話</td>
        <td class="pp">
            <input type="text" name="tel" value="<?=$row['tel'];?>">
            </td>
    </tr>
</table>
<table class="all">
    <tr class="tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $total=0;
foreach($_SESSION['cart'] as $id=>$qt){
    $row=$Goods->find($id);
    ?>
    <tr class="pp">
        <td><?=$row['name'];?></td>
        <td><?=$row['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$row['price'];?></td>
        <td>
            <?php
            $total+=$row['price']*$qt;
            echo $row['price']*$qt;
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<table class="all">
    <tr  class="tt">
        <td class="ct">總價：<span id="total"><?=$total;?></span></td>
    </tr>
</table>
<div class="ct">
    <button onclick="order()">確定送出</button>
    <input type="button" value="返回修改訂單"onclick="location.href='?do=buycart'">
    </div>
<script>
    function order(){
        
        let data={
            name:$('#name').val(),
            email:$('#email').val(),
            addr:$('#addr').val(),
            tel:$('#tel').val(),
            total:$('#total').text(),
        }
$.post('api/order.php',data,function(){
alert('訂購成功\n感謝您的選購');
location.href="?do=main";
})
    }
</script>