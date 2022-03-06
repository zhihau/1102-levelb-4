<div class="text" id="text0">
<h1 class="ct">最新消息</h1>
<div class="ct" style="color:red">* 點擊標題觀看詳細資訊</div>

<table class="all">
    <tr class="ct tt">
        <td>標題</td>
    </tr>
    <tr class="pp">
        <td id="t1" class="t">
            情人節特惠活動
        </td>
    </tr>
    <tr class="pp">
        <td id="t2" class="t">年終特賣會開跑了</td>
    </tr>
</table>
</div>

<div class="text" id="text1" style="display:none">
<h1 class="ct">最新消息</h1>
<table class="all" >
    <tr class="ct">
        <td class="tt">標題</td>
        <td  class="pp">情人節特惠活動</td>
    </tr>
    <tr class="ct">
        <td class="tt">內容</td>
        <td  class="pp">了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
    </tr>
</table>
<div class="ct"><button class="back">返回</button></div>
</div>

<div class="text" id="text2" style="display:none">
<h1 class="ct">最新消息</h1>
<table class="all" >
    <tr class="ct">
        <td class="tt">標題</td>
        <td  class="pp">年終特賣會開跑了</td>
    </tr>
    <tr class="ct">
        <td class="tt">內容</td>
        <td  class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
    </tr>
</table>
<div class="ct"><button class="back">返回</button></div>
</div>

<script>
    $('.t').on('click',function(){
id=$(this).attr('id').replace('t','');
$('.text').hide();
$('#text'+id).show();
    })
    $('.back').on('click',function(){
        $('.text').hide();
$('#text0').show();
    })
</script>