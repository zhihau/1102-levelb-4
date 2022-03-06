<h1 class="ct">會員註冊</h1>

<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"><button onclick="chk_acc()">檢測帳號</button></td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button><button onclick="reset()">重置</button>
   
</div>


<script>
function reset() {
    $("#name,#acc,#pw,#tel,#addr,#email").val("");
}

function chk_acc() {
    $.post('api/chk_acc.php', {
        acc: user.acc
    }, function(chk) {
        if (user.acc == "admin") {
            alert("帳號已存在")
        } else if (parseInt(chk) == 1) {
            alert("帳號已存在")
        } else {
            alert("帳號可使用")
        }
    })
}

function reg() {
    let user = {
        name: $('#name').val(),
        acc: $('#acc').val(),
        pw: $('#pw').val(),
        tel: $('#tel').val(),
        addr: $('#addr').val(),
        email: $('#email').val(),
    }
    $.post('api/chk_acc.php', {
        acc: user.acc
    }, function(chk) {
        if (user.acc == "admin") {
            alert("帳號已存在")
        } else if (parseInt(chk) == 1) {
            alert("帳號已存在")
        } else {
            $.post('api/reg.php', user, function(chk) {
                if (parseInt(chk) == 0) {
                    alert("註冊失敗")
                } else {
                    alert("註冊成功，歡迎加入")
                    location.href = "?do=login"
                }
            })
        }

    })
}
</script>