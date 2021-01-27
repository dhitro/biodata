<?php
include "db.php";
$longitude = 0;
$latitude = 0;

if (isset($_GET["longitude"]) && isset($_GET["latitude"])) {
    $longitude = $_GET["longitude"];
    $latitude = $_GET["latitude"];
}
$sql = "SELECT OBJECTID,KL_DAT_DAS,NAMA_RUAS,
ACOS( SIN( RADIANS( KOORD_Y_AW ) ) * SIN( RADIANS( $latitude ) ) + COS( RADIANS( KOORD_Y_AW ) )
* COS( RADIANS( $latitude )) * COS( RADIANS( KOORD_X_AW ) - RADIANS( $longitude )) ) * 6380 AS distanceA,
ACOS( SIN( RADIANS( KOORD_Y_AK ) ) * SIN( RADIANS( $latitude ) ) + COS( RADIANS( KOORD_Y_AK ) )
* COS( RADIANS( $latitude )) * COS( RADIANS( KOORD_X_AK ) - RADIANS( $longitude )) ) * 6380 AS distanceB
 FROM jalan where  
 ACOS( SIN( RADIANS( KOORD_Y_AW ) ) * SIN( RADIANS( $latitude ) ) + COS( RADIANS( KOORD_Y_AW ) )
* COS( RADIANS( $latitude )) * COS( RADIANS( KOORD_X_AW ) - RADIANS( $longitude )) ) * 6380 < 30
OR
ACOS( SIN( RADIANS( KOORD_Y_AK ) ) * SIN( RADIANS( $latitude ) ) + COS( RADIANS( KOORD_Y_AK ) )
* COS( RADIANS( $latitude )) * COS( RADIANS( KOORD_X_AK ) - RADIANS( $longitude )) ) * 6380 < 30
ORDER BY distanceA ASC,distanceB ASC
 ";
$run = mysqli_query($con, $sql);
$respon = array();
while ($a = mysqli_fetch_array($run)) {
    $key['id'] = $a['OBJECTID'];
    $key['status'] = $a['KL_DAT_DAS'];
    $key['ruas'] = $a['NAMA_RUAS'];
    $key['jarakA'] = $a['distanceA'];
    $key['jarakB'] = $a['distanceB'];

    array_push($respon, $key);
}

echo json_encode($respon);
