<?php
include "db.php";
$id_unit = 0;
$id_skpd = 0;

if (isset($_GET["id_unit"]) && isset($_GET["id_skpd"])) {
    $id_unit = $_GET["id_unit"];
    $id_skpd = $_GET["id_skpd"];
}
$sql = "SELECT
kegiatan.id,
kegiatan.kegiatan,
kegiatan.uraian,
kegiatan.jenis,
kegiatan.permasalahan,
kegiatan.vol,
kegiatan.satuan,
kegiatan.`long`,
kegiatan.lat,
kegiatan.alamat,
kegiatan.kondisi,
kegiatan.survei,
kegiatan.kategori,
kegiatan.isi_kategori,
kegiatan.keterangan,
kegiatan.id_unit,
kegiatan.id_skpd,
kegiatan.stat_verif,
kegiatan.stat_survey,
kegiatan.stat_kirim,
opd.kode_skpd,
opd.nama_skpd
FROM
kegiatan
INNER JOIN opd ON kegiatan.id_skpd = opd.id_skpd AND kegiatan.id_unit = opd.id_unit
";
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
    $key['kategori'] = $a['kategori'];
    $key['isi_kategori'] = $a['isi_kategori'];
    $key['keterangan'] = $a['keterangan'];
    $key['id_unit'] = $a['id_unit'];
    $key['id_skpd'] = $a['id_skpd'];
    $key['stat_verif'] = $a['stat_verif'];
    $key['stat_survey'] = $a['stat_survey'];
    $key['stat_kirim'] = $a['stat_kirim'];
    $key['kode_skpd'] = $a['kode_skpd'];
    $key['nama_skpd'] = $a['nama_skpd'];
    array_push($respon, $key);
}

echo json_encode($respon);
