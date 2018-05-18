<?php 
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];//自动登录
if($verify==$verify1){
	$sql="select * from shop_admin where username='{$username}' and password='{$password}'";
//    var_dump($sql);
	$row=checkAdmin($sql);
//	var_dump($row);
	if($row){
        //如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+7*24*3600);//time()+7*24*3600当前一周
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];//
		$_SESSION['adminId']=$row['id'];
		alertMes("登陆成功","index.php");
	}else{
		alertMes("登陆失败，重新登陆","login.php");
	}
}else{
	alertMes("验证码错误","login.php");
}