<?php
include "db.php";
$id_kegiatan = 0;

if (isset($_GET["id_kegiatan"])) {
    $id_kegiatan = $_GET["id_kegiatan"];
}
$sql = "SELECT * FROM file WHERE id_kegiatan = '$id_kegiatan'";

$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id'] = $a['id'];
    $key['id_kegiatan'] = $a['id_kegiatan'];
    $key['nama_file'] = $a['nama_file'];
    $key['type_file'] = $a['type_file'];
    $key['is_kegiatan'] = $a['is_kegiatan'];
    array_push($respon, $key);
}

echo json_encode($respon);
