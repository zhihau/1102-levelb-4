<form action="api/save_goods.php" method="post" enctype="multipart/form-data">
    <h1 class="ct">修改商品</h1>
    <?php
$row=$Goods->find($_GET['id']);
// dd($row);
// echo $row['intro'];
    ?>
    <table class="all">
        <tr>
            <td class="ct tt">所屬大分類</td>
            <td class="pp">
            <select name="big" id="big">
                
            </td>
        </tr>
        <tr>
            <td class="ct tt">所屬中分類</td>
            <td class="pp">
            <select name="mid" id="mid">
                    
                    </select>
            </td>
        </tr>
        <tr>
            
            <td class="ct tt">商品編號</td>
            <td class="pp"><?=$row['no'];?></td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp"><input type="number" name="price" value="<?=$row['price'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?=$row['spec'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp"><input type="number" name="stock" value="<?=$row['stock'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td class="ct tt">商品介紹</td>
            <td class="pp"><textarea name="intro" id="intro" cols="30" rows="10"><?=$row['intro'];?></textarea></td>
        </tr>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
    </table>
    <div class="ct">
    <input type="submit" value="修改">|
    <input type="reset" value="重置">|
    <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>
<script>
      $('#big').load('api/load_type.php',{type:'big'},function(){
          $("#big option[value='<?=$row[
              'big']?>']").prop('selected',true)
              $('#mid').load('api/load_type.php',{type:'mid',parent:<?=$row['big'];?>},function(){
$("#mid option[value='<?=$row['mid'];?>']").prop('selected',true)
              })
        });

    $('#big').on('change',function(){
        $('#mid').load('api/load_type.php',{type:'mid',parent:$(this).val()},function(){
        });
    })
</script>