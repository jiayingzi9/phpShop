<?php
/*连接数据库*/
function connect(){
    global $link;
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD,DB_DBNAME) or die("数据库连接失败Error:" . mysqli_errno() . ":" . mysqli_error());
    //mysqli_set_charset($link, DB_CHAREST);
    //mysqli_select_db($link,DB_DBNAME) or die("用户名错误");
    //$link=new mysqli("localhost", "root", "", "shop");
    //$link= new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
    if ($link->connect_error) {
        die("连接失败: " . $link->connect_error);
    }
    return $link;
}

/*插入记录*/
function insert($table, $array){
    global $link;
    $keys = "".join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$vals})";
//     mysqli_query(connect(),$sql);
//     return mysqli_insert_id(connect());
    /*这里不能用connect()是因为使用connect()时又执行了一次数据库连接，
     就拿不到mysqli_insert_id的最新一次id,获取到的永远都是0;*/
    //print_r($sql);exit;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    //不能用mysqli_query(connect(), $sql);
    $result=mysqli_query($link, $sql);
    //不能用mysqli_insert_id(connect());
    if($result){
        return mysqli_insert_id($link);
    }else{
        return false;
    }
}

/*更新记录*/
function update($table, $array, $where = null){
    global $link;
    //定义放在循环外面！！！！！！！
    $str = "";
    foreach ($array as $key => $val) {
        if ($str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str .= $sep . $key . "='" . $val . "'";
    }
    $sql = "update {$table} set {$str} " . ($where == null ? null : " where " . $where);
    //echo $sql;exit;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;     
    }
}
/**删除记录*/
function delete($table, $where = null){
    global $link;
    $where = $where == null ? null : " where " . $where;
    $sql = "delete from {$table}{$where}";
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }
}

/**获取其中一条记录*/
function fetchOne($sql){
    global $link;
    var_dump($sql);
//    $result = mysqli_query($link,"select * from shop_admin where username='admin' and password='admin'");
    $result = mysqli_query($link,$sql);
//    var_dump($result);
    if($result){
        return mysqli_fetch_assoc($result);
    }
    else{
        return false;
    }
}

/* 获取所有记录*/
function fetchAll($sql){
    global $link;
    //$link = new mysqli("localhost", "root", "123456", "shop");
    $result = mysqli_query($link,$sql);
    while (@$row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/*获取记录条数*/
function getResultNum($sql){
    global $link;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}

/*获取插入记录的id*/
function getInsertId(){
    global $link;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    return mysqli_insert_id($link);
}
