<?php
include "db.php";
$id_unit = 0;
$id_skpd = 0;

if (isset($_GET["id_unit"]) && isset($_GET["id_skpd"])) {
    $id_unit = $_GET["id_unit"];
    $id_skpd = $_GET["id_skpd"];
}
$sql = "SELECT * FROM satuan ";
$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id'] = $a['id'];
    $key['satuan'] = $a['satuan'];
    array_push($respon, $key);
}

echo json_encode($respon);
