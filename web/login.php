<?php

// var_dump($_POST);
$username = $_POST['username'];
$password = $_POST['password'];

// 从数据中查询用户名密码是否正确

function check_user($username, $password) {
    $db = new mysqli('localhost:3307', 'root', 'root', 'mydb');
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if($row) {
        return true;
    } else {
        return false;
    }
}

if(check_user($username, $password)) {
    $return_data = array(
        'code' => 200,
       'msg' => '登录成功！'
    );
    echo json_encode($return_data);
} else {
    $return_data = array(
        'code' => 400,
       'msg' => '用户名或密码错误！'
    );
    echo json_encode($return_data);
}

?>