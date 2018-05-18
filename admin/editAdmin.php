<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select id,username,password,email from shop_admin where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h3 class="title-style">编辑管理员</h3>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post" class="title-box">
<table class="title-table">
	<tr>
		<td align="right">管理员名称</td>
		<td><input type="text" class="tdInput" name="username" placeholder="<?php echo $row['username'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" class="tdInput" name="password"  value="<?php echo $row['password'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员邮箱</td>
		<td><input type="text" class="tdInput" name="email" placeholder="<?php echo $row['email'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="btn compileBule" value="编辑管理员"/></td>
	</tr>

</table>
</form>
</body>
</html>