<?php
include "db.php";
$id_unit = 0;
$id_skpd = 0;

if (isset($_GET["id_unit"]) && isset($_GET["id_skpd"])) {
    $id_unit = $_GET["id_unit"];
    $id_skpd = $_GET["id_skpd"];
}
$sql = "SELECT * FROM kegiatan where id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id'] = $a['id'];
    $key['kegiatan'] = $a['kegiatan'];
    $key['uraian'] = $a['uraian'];
    $key['jenis'] = $a['jenis'];
    $key['permasalahan'] = $a['permasalahan'];
    $key['vol'] = $a['vol'];
    $key['satuan'] = $a['satuan'];
    $key['long'] = $a['long'];
    $key['lat'] = $a['lat'];
    $key['alamat'] = $a['alamat'];
    $key['kondisi'] = $a['kondisi'];
    $key['survei'] = $a['survei'];
    $key['keterangan'] = $a['keterangan'];
    $key['id_unit'] = $a['id_unit'];
    $key['id_skpd'] = $a['id_skpd'];
    $key['stat_verif'] = $a['stat_verif'];
    $key['stat_survey'] = $a['stat_survey'];
    array_push($respon, $key);
}

echo json_encode($respon);
