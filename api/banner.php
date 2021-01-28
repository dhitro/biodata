<?php
include "db.php";
$sql = "SELECT * FROM banner where is_tampil = '1' ";
$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id'] = $a['id'];
    $key['banner'] = $a['banner'];
    array_push($respon, $key);
}

echo json_encode($respon);
