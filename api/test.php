<?php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respon = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users where username = '$username' and password = '$password'";
    $run = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($run);
    if ($res) {
        $key['msg'] = "Berhasil Login";
        $key['username'] = $res['username'];
        $key['level'] = $res['level'];
    } else {
        $key['msg'] = "Maaf User Atau Password Tidak Ada";
    }
    array_push($respon, $key);
    echo json_encode($respon);
} else {


    $sql = "SELECT * FROM users";
    $run = mysqli_query($con, $sql);
    $respon = array();
    while ($a = mysqli_fetch_array($run)) {
        $key['username'] = $a['username'];
        $key['email'] = $a['email'];
        $key['level'] = $a['level'];
        array_push($respon, $key);
    }

    echo json_encode($respon);
}
