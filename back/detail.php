<?php
$id=$_GET['id'];
$row=$Ord->find($id);
?>
<h1 class="ct">訂單編號<span style="color:red"><?=$row['no'];?></span>的詳細資料</h1>
<table class="all">
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?=$row['acc'];?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?=$row['name'];?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?=$row['email'];?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?=$row['addr'];?></td>
    </tr>
    <tr>
        <td class="tt">連絡電話</td>
        <td class="pp"><?=$row['tel'];?></td>
    </tr>
</table>
<table class="all">
    <tr class="tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
    </tr>
    <tr class="pp">
        <td><?=$row['name'];?></td>
        <td><?=$row['no'];?></td>
        <td><?=$row['qt'];?></td>
        <td><?=$row['price'];?></td>
    </tr>
</table>
<table class="all">
    <tr  class="tt">
        <td class="ct">總價：</td>
    </tr>
</table>
<div class="ct">
    <button onclick="location.href='back.php?do=order'">返回</button>
    </div>