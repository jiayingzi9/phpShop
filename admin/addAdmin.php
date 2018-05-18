<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h3 class="title-style">添加管理员</h3>
<form action="doAdminAction.php?act=addAdmin" method="post" class="title-box">
<table class="title-table">
	<tr>
		<td align="right">管理员名称</td>
		<td><input class="tdInput" type="text" name="username" placeholder="请输入名称"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input  class="tdInput" class="tdInput" type="password" name="password" /></td>
	</tr>
	<tr>
		<td align="right">管理员邮箱</td>
		<td><input class="tdInput" type="text" name="email" placeholder="请输入邮箱"/></td>
	</tr>
<!--	<tr>-->
<!--		<td colspan="2"><input type="submit"  value="添加管理员" class="tab-btn"/></td>-->
<!--	</tr>-->
</table>
    <input type="submit"  value="添加管理员" class="tab-btn"/>
</form>
</body>
</html>