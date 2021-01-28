<?php
include "db.php";
$sql = "SELECT A.id_skpd, A.id_unit,
opd.kode_skpd,
opd.nama_skpd,
SUM(A.total_giat) as total_giat,
SUM(A.total_belumkirim) as total_belumkirim,
SUM(A.total_belumverif) as total_belumverif,
SUM(A.total_sudahverif) as total_sudahverif

FROM
(SELECT
kegiatan.id_unit,
kegiatan.id_skpd,
count(kegiatan.kegiatan) total_giat ,
CASE WHEN kegiatan.stat_kirim = '0'  then count(kegiatan.kegiatan) ELSE 0 END as total_belumkirim,
CASE WHEN kegiatan.stat_verif = '0' and kegiatan.stat_kirim = '1'  then count(kegiatan.kegiatan) ELSE 0 END as total_belumverif,
CASE WHEN kegiatan.stat_verif = '1' and kegiatan.stat_kirim = '1' then count(kegiatan.kegiatan) ELSE 0 END as total_sudahverif
FROM
kegiatan
GROUP BY
kegiatan.id_unit,
kegiatan.id_skpd,
kegiatan.stat_verif,
kegiatan.stat_kirim ) A
INNER JOIN opd ON
A.id_skpd = opd.id_skpd
AND A.id_unit = opd.id_unit

GROUP BY A.id_skpd , A.id_unit,
opd.kode_skpd,
opd.nama_skpd";
$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id_skpd'] = $a['id_skpd'];
    $key['id_unit'] = $a['id_unit'];
    $key['kode_skpd'] = $a['kode_skpd'];
    $key['nama_skpd'] = $a['nama_skpd'];
    $key['total_giat'] = $a['total_giat'];
    $key['total_belumkirim'] = $a['total_belumkirim'];
    $key['total_belumverif'] = $a['total_belumverif'];
    $key['total_sudahverif'] = $a['total_sudahverif'];
    array_push($respon, $key);
}

echo json_encode($respon);
