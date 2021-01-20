<?php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respon = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users where (username = '$username' OR email = '$username') and password = '$password'";
    $run = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($run);
    if ($res) {
        $key['msg'] = 1;
        $key['username'] = $res['username'];
        $key['level'] = $res['level'];
        $key['id_unit'] = $res['id_unit'];
        $key['id_skpd'] = $res['id_skpd'];
    } else {
        $key['msg'] = 0;
    }
    array_push($respon, $key);
    echo json_encode($respon);
}
