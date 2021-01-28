<?php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respon = array();
    $id_unit = $_POST['id_unit'];
    $id_skpd = $_POST['id_skpd'];
    $id_kegiatan = $_POST['id_kegiatan'];
    $stat_kirim = 1;

    $sql = "UPDATE kegiatan SET stat_verif = 1 WHERE id_unit = '$id_unit' AND id_skpd = '$id_skpd' AND id = '$id_kegiatan' ";

    if (mysqli_query($con, $sql)) {
        $key['msg'] = 1;
    } else {
        $key['msg'] = 0;
        // $key['all'] = $_FILES['image']['name'];
    }
    array_push($respon, $key);
    echo json_encode($respon);
}
