<?php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respon = array();
    $kegiatan = $_POST['kegiatan'];
    $uraian = $_POST['uraian'];
    $jenis = $_POST['jenis'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];
    $alamat = $_POST['alamat'];
    $kondisi = $_POST['kondisi'];
    $keterangan = $_POST['keterangan'];
    // var_dump($_FILES['image']['name']);


    $sql = "INSERT INTO usulan VALUE(NULL,'$kegiatan','$uraian','$jenis','$long','$lat','$alamat','$kondisi','$keterangan','','','','')";

    // $res = mysqli_fetch_array($run);

    if (mysqli_query($con, $sql)) {
        $last_id = mysqli_insert_id($con);
        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
            // foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES['image']['name'][$i]));
            $path = __DIR__ . "/upload/" . $image;
            $ext = explode('.', basename($_FILES['image']['name'][$i])); //explode file name from dot(.) 
            $file_extension = end($ext); //store extensions in the variable

            // if (!file_exists("upload/" . $image)) {
            // move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$i],"photo_gallery/".$txtGalleryName."/".$file_name);
            @move_uploaded_file($_FILES['image']['tmp_name'][$i], getcwd() . DIRECTORY_SEPARATOR . "upload/" . $image);

            $sql_file = "INSERT INTO file VALUE(NULL,$last_id,'$image','$file_extension',0)";
            if (mysqli_query($con, $sql_file)) {
            }
            // }
        }


        $key['msg'] = 1;
        $key['id'] = $last_id;
    } else {
        $key['msg'] = 0;
        // $key['all'] = $_FILES['image']['name'];
    }
    array_push($respon, $key);
    echo json_encode($respon);
}
