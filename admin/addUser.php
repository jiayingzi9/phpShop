<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h3 class="title-style">添加用户</h3>
<form action="doAdminAction.php?act=addUser" method="post" class="title-box" enctype="multipart/form-data">
<table class="title-table">
	<tr>
		<td align="right">用户名</td>
		<td><input type="text" name="username" class="tdInput" placeholder="用户名"/></td>
	</tr>
	<tr>
		<td align="right">密码</td>
		<td><input type="password" name="password"  class="tdInput"/></td>
	</tr>
	<tr>
		<td align="right">邮箱</td>
		<td><input type="text" name="email" placeholder="请输入邮箱" class="tdInput"/></td>
	</tr>
	<tr>
		<td align="right">性别</td>
		<td><input type="radio" name="sex" value="1" checked="checked"/>男
		<input type="radio" name="sex" value="2" />女
		<input type="radio" name="sex" value="3" />保密
		</td>
	</tr>
	<tr>
		<td align="right">头像</td>
		<td><input type="file" name="myFile" style="border: none;" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="tab-btn"  value="添加用户"/></td>
	</tr>

</table>
</form>
</body>
</html>