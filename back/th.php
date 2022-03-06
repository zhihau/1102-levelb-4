<h1 class="ct">商品分類</h1>

<div>新增大分類<input type="text" name="big" id="big"><button onclick="addType('big')">新增</button></div>
<div>新增中分類
    <select name="bigid" id="bigid">
        <?php
$types=$Type->all(['parent'=>0]);
foreach($types as $type){
        ?>
        <option value="<?=$type['id'];?>"><?=$type['name'];?></option>
        <?php
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid"><button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php
    $types=$Type->all(['parent'=>0]);
    foreach($types as $type){
    ?>
    <tr class="tt">
        <td><?=$type['name'];?></td>
        <td class="ct">
            <button onclick="edit(this,<?=$type['id'];?>)">修改</button>
            <button onclick="del('type',<?=$type['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
        $mids=$Type->all(['parent'=>$type['id']]);
        foreach($mids as $mid){
        ?>
    <tr class="pp">
        <td class="ct"><?=$mid['name'];?></td>
        <td class="ct">
            <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
            <button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
        }
        ?>
    <?php
    }
    ?>
</table>

<h1 class="ct">商品管理</h1>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows=$Goods->all();
    foreach($rows as $row){
    ?>
    <tr class="pp">
        <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['stock'];?></td>
        <td><?=$row['sh']==1?"販售中":"已下架";?></td>
        <td>
            <button  onclick="location.href='?do=edit_goods&id=<?=$row['id'];?>'">修改</button>
            <button onclick="del('goods',<?=$row['id'];?>)">刪除</button>
            <button onclick="show(this)" data-sh="1" data-id="<?=$row['id'];?>">上架</button>
            <button onclick="show(this)" data-sh="0" data-id="<?=$row['id'];?>">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
function addType(type) {
    var data;
    switch (type) {
        case 'big':
            data = {
                name: $('#' + type).val(),
                parent: 0,
            }
            break;
        case 'mid':
            data = {
                name: $('#' + type).val(),
                parent: $('#bigid').val(),
            }
            break;
    }

    $.post('api/add_type.php', data, function() {
        location.reload();
    })
}

function edit(dom, id) {
    name = prompt("修改分類", $(dom).parent('td').prev().text());
    console.log(name);
    let data={
        id,name
    }
    $.post('api/add_type.php',data,function(){
        location.reload();
    })
}


function del(table, id) {
    $.post("api/del.php", {
        table,
        id
    }, function() {
        location.reload()
    })
}

function show(dom){
    let data={id:$(dom).data('id'),sh:$(dom).data('sh')}
    console.log(data);
    
    $.post('api/save_goods.php',data,function(){
        // console.log($(dom).parent('td').prev().text());
        switch($(dom).data('sh')){
            case 1:
                $(dom).parent('td').prev().text("販售中");
                break;
            case 0:
                $(dom).parent('td').prev().text("已下架");
                break;
        }
        
    })
}
</script>