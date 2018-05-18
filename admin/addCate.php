<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h3 class="title-style">添加分类</h3>
<form action="doAdminAction.php?act=addCate" method="post" class="title-box">
<table class="title-table">
	<tr>
		<td align="right">分类名称</td>
		<td><input type="text" name="cName" class="tdInput" placeholder="请输入分类名称"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="tab-btn"  value="添加分类"/></td>
	</tr>

</table>
</form>
</body>
</html>