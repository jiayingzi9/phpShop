<?php 
require_once '../include.php';
checkLogined();//检查是否有管理员登录
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>title</title>
<link rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" href="styles/public.css">
<script src="scripts/jquery-1.12.4.js"></script>
</head>

<body>
    <div class="operation_user clearfix">
          <div class="link fl"><a href="#">后台管理系统</a></div>
        <div class="link fr">
            <b>欢迎您
            <?php
				if(isset($_SESSION['adminName'])){ //$_SESSION启动新会话或者重用现有会话
					echo $_SESSION['adminName'];
				}elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
            ?>
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">公告管理</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
<!--        <div class="link fr">-->
<!--            <b>欢迎您 --><?php //echo $_SESSION['adminName'];?><!--</b>-->
<!--            &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>-->
<!--        </div>-->
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
<!--                <div class="title">后台管理</div>-->
      	 		<!-- 嵌套网页开始 -->
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="770px"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <!--左侧导航-->
            <div id="public" style="width:200px;"></div>
        </div>

    </div>
    <script src="scripts/public.js"></script>
    <!-- 左侧导航插件-->
    <script>
        new window['public']({
            width: 200,
            data: [
                {id: 1, text: '后台首页', checked: false,href:'main.php',target:'mainFrame'},
                {id: 2, text: '管理员管理', checked:false, children: [
                    {id: 21, text: '添加管理员', checked: false,href:'addAdmin.php',target:'mainFrame'},
                    {id: 22, text: '用户列表', checked: false,href:'listAdmin.php',target:'mainFrame'}
                ]},
                {id: 2, text: '用户管理', checked:false, children: [
                    {id: 21, text: '添加用户', checked: false,href:'addUser.php',target:'mainFrame'},
                    {id: 22, text: '用户列表', checked: false,href:'listUser.php',target:'mainFrame'}
                ]},
                {id: 2, text: '商品列表', checked:false, children: [
                    {id: 21, text: '添加商品', checked: false,href:'addPro.php',target:'mainFrame'},
                    {id: 22, text: '商品列表', checked: false,href:'listPro.php',target:'mainFrame'}
                ]},
                {id: 2, text: '商品分类', checked:false, children: [
                    {id: 21, text: '商品分类', checked: false,href:'addCate.php',target:'mainFrame'},
                    {id: 22, text: '分类列表', checked: false,href:'listCate.php',target:'mainFrame'}
                ]},
                {id: 2, text: '商品订单', checked:false, children: [
                    {id: 21, text: '订单修改', checked: false,}
                ]},
                {id: 2, text: '商品图片管理', checked:false, children: [
                    {id: 21, text: '商品分类', checked: false,href:'listProImages.php',target:'mainFrame'}
                ]},
            ],
            onItemClick: function(e) {
                console.log('点击节点');
            }
        }).$el.appendTo($('#public'));
    </script>
</body>
</html>