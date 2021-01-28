<?php
include "db.php";
$sql = "SELECT * FROM berita where is_tampil = '1' ORDER BY created_date DESC ";
$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id'] = $a['id'];
    $key['judul'] = $a['judul'];
    $key['berita'] = $a['berita'];
    $key['created_date'] = $a['created_date'];
    array_push($respon, $key);
}

echo json_encode($respon);
