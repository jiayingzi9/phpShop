<?php 
require_once '../include.php';
checkLogined();//检查是否有管理员登录
$act=$_REQUEST['act'];
//@$id=$_REQUEST['id'];
if($act=="logout"){
	logout();//注销管理员
}elseif($act=="addAdmin"){
	$mes=addAdmin();
}elseif($act=="editAdmin"){
	$mes=editAdmin($id);
}elseif($act=="delAdmin"){
	$mes=delAdmin($id);
}elseif($act=="addCate"){
	$mes=addCate();
}elseif($act=="editCate"){
	$where="id={$id}";
	$mes=editCate($where);
}elseif($act=="delCate"){
	$mes=delCate($id);
}elseif($act=="addPro"){
    $mes=addPro();
}elseif($act=="editPro"){
    $mes=editPro($id);
}elseif($act=="delPro"){
    $mes=delPro($id);
}elseif($act=="addUser"){
    $mes=addUser();
}elseif ($act=="editUser"){
    $mes=editUser($id);
}elseif($act=="delUser"){
    $mes=delUser($id);
}elseif($act=="waterText"){
    $mes=doWaterText($id);
}elseif($act=="waterPic"){
    $mes=doWaterPic($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
	if($mes){
		echo $mes;//消息提示
	}
?>
</body>
</html>