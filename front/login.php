<h1>第一次購物</h1>
<a href="?do=reg"><img src="icon/0413.jpg" alt=""></a>
<h1>會員登入</h1>

    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">驗證碼</td>
            <td class="pp">
                <?php
    $a=rand(10,99);
    $b=rand(10,99);
    $_SESSION['ans']=$a+$b;
    echo $a."+".$b."=";
                ?>
                <input type="text" name="ans" id="ans">
            </td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="login()">確認</button>
        </div>

<script>
    function login(){
let user={
    acc:$('#acc').val(),
    pw:$('#pw').val(),
    ans:$('#ans').val(),
    
}
$.post('api/chk_ans.php?table=mem',{ans:user.ans},function(chk){
  if(parseInt(chk)==0){
      alert("對不起，您輸入的驗證碼錯誤請重新輸入");
  }else{
      delete user.ans;
    $.post('api/chk_pw.php?table=mem',user,function(chk){
    if(parseInt(chk)==0){
        alert("帳號或密碼錯誤");
    }else{
        location.href="?do=buycart";
    }
  })
}
})
    }
</script>