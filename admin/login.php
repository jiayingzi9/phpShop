<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/style.css">
<!--[if IE 6]>
<script type="text/javascript" src="../js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="../js/ie6Fixpng.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<![endif]-->
</head>
<body class="login-body">
<div class="main-agileinfo">
    <h2>欢迎登录</h2>
    <form action="doLogin.php" method="post" class="login-from">
        <ul class="subUL" id="login">
            <li class="l_tit">帐号</li>
            <li class="mb_10"><input type="text"  name="username" placeholder="请输入帐号"class="login_input user_icon"></li>
            <li class="l_tit">密码</li>
            <li class="mb_10"><input type="password"  name="password" placeholder="请输入密码" class="login_input password_icon"></li>
            <li class="l_tit">验证码</li>
            <li class="mb_10"><input type="text"  name="verify" class="login_input password_icon" style="width:55%;"><img src="getVerify.php" alt="" style="margin-left:5%;vertical-align: middle;" /></li>
<!--            <img src="getVerify.php" alt="" />-->
            <div style="clear: both;"></div>
        </ul>
        <ul class="mar-login">
            <li class="autoLogin lf"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label></li>
            <li class="rt">忘记密码</li>
            <div style="clear: both;"></div>
        </ul>
        <input type="submit" value="登录" class="LoginFooter">
    </form>
</div>
<div class="footer-w3l">
    <p class="agile"> &copy; 2018 xxxxxxxxxxxxx</a></p>
</div>
</body>
</html>
