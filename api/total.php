<?php
include "db.php";
$id_unit = 0;
$id_skpd = 0;

if (isset($_GET["id_unit"]) && isset($_GET["id_skpd"])) {
    $id_unit = $_GET["id_unit"];
    $id_skpd = $_GET["id_skpd"];
}

$respon = array();

$sql = "SELECT COUNT(kegiatan) as total_giat FROM kegiatan where id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_giat = $row['total_giat'];
$key['total_giat'] = $total_giat;

$sql = "SELECT COUNT(kegiatan) as total_verif FROM kegiatan where stat_verif = '1' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_verif = $row['total_verif'];
$key['total_verif'] = $total_verif;

$sql = "SELECT COUNT(kegiatan) as total_belumverif FROM kegiatan where stat_verif = '0' and stat_kirim = '1' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_belumverif = $row['total_belumverif'];
$key['total_belumverif'] = $total_belumverif;

$sql = "SELECT COUNT(kegiatan) as total_verif FROM kegiatan where stat_verif = '1' and stat_kirim = '1' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_verif = $row['total_verif'];
$key['total_verif'] = $total_verif;

$sql = "SELECT COUNT(kegiatan) as total_belumkirim FROM kegiatan where stat_kirim = '0' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_belumkirim = $row['total_belumkirim'];
$key['total_belumkirim'] = $total_belumkirim;


$sql = "SELECT COUNT(kegiatan) as total_survei FROM kegiatan where stat_survey = '1' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_survei = $row['total_survei'];
$key['total_survei'] = $total_survei;

$sql = "SELECT COUNT(kegiatan) as total_rutin FROM kegiatan where permasalahan = 'Rutin' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_rutin = $row['total_rutin'];
$key['total_rutin'] = $total_rutin;

$sql = "SELECT COUNT(kegiatan) as total_pembangunan FROM kegiatan where permasalahan = 'Pembangunan' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_pembangunan = $row['total_pembangunan'];
$key['total_pembangunan'] = $total_pembangunan;

$sql = "SELECT COUNT(kegiatan) as total_ringan FROM kegiatan where kondisi = 'Ringan' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_ringan = $row['total_ringan'];
$key['total_ringan'] = $total_ringan;

$sql = "SELECT COUNT(kegiatan) as total_sedang FROM kegiatan where kondisi = 'Sedang' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_sedang = $row['total_sedang'];
$key['total_sedang'] = $total_sedang;

$sql = "SELECT COUNT(kegiatan) as total_berat FROM kegiatan where kondisi = 'Berat' and id_unit = '$id_unit' and id_skpd='$id_skpd'";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
$total_berat = $row['total_berat'];
$key['total_berat'] = $total_berat;

array_push($respon, $key);

echo json_encode($respon);
