<?php 
require_once '../include.php';
checkLogined();
$rows=getAllCate();
if(!$rows){
	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/style.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3 class="title-style">添加</h3>
<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data" class="title-box">
<table class="title-table">
	<tr>
		<td align="right">名称</td>
		<td><input type="text" name="pName" class="tdInput"  placeholder="请输入商品名称"/></td>
	</tr>
	<tr>
		<td align="right">分类</td>
		<td>
		<select name="cId" class="tdSelect">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['cName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">货号</td>
		<td><input type="text" name="pSn"  class="tdInput" placeholder="请输入商品货号"/></td>
	</tr>
	<tr>
		<td align="right">数量</td>
		<td><input type="text" name="pNum" class="tdInput"  placeholder="请输入商品数量"/></td>
	</tr>
	<tr>
		<td align="right">市场价</td>
		<td><input type="text" name="mPrice"  class="tdInput" placeholder="请输入商品市场价"/></td>
	</tr>
	<tr>
		<td align="right">价格</td>
		<td><input type="text" name="iPrice" class="tdInput" placeholder="请输入商品价"/></td>
	</tr>
	<tr>
		<td align="right">描述</td>
		<td>
			<textarea name="pDesc" id="editor_id" style="width:100%;height:150px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">图像</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  class="btn modification" style="margin: 10px 0" value="发布"/></td>
	</tr>
</table>
</form>
</body>
</html>