<?php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respon = array();
    $kegiatan = $_POST['kegiatan'];
    $uraian = $_POST['uraian'];
    $jenis = $_POST['jenis'];
    $permasalahan = $_POST['permasalahan'];
    $volume = $_POST['volume'];
    $satuan = $_POST['satuan'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];
    $alamat = $_POST['alamat'];
    $kondisi = $_POST['kondisi'];
    $survei = 0;
    $keterangan = $_POST['keterangan'];
    $id_unit = $_POST['id_unit'];
    $id_skpd = $_POST['id_skpd'];
    $stat_verif = 0;
    $stat_survey = 0;
    // var_dump($_FILES['image']['name']);


    $sql = "INSERT INTO kegiatan VALUE(NULL,'$kegiatan','$uraian','$jenis','$permasalahan',$volume,'$satuan',$long,$lat,'$alamat','$kondisi',NULL,'$keterangan',$id_unit,$id_skpd,$stat_verif,$stat_survey)";

    // $res = mysqli_fetch_array($run);

    if (mysqli_query($con, $sql)) {
        $last_id = mysqli_insert_id($con);
        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
            // foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
            $image = date('dMYHis') . str_replace(" ", "", basename($_FILES['image']['name'][$i]));
            $path = "upload/" . $image;
            $ext = explode('.', basename($_FILES['image']['name'][$i])); //explode file name from dot(.) 
            $file_extension = end($ext); //store extensions in the variable

            if (!file_exists("upload/" . $image)) {
                // move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$i],"photo_gallery/".$txtGalleryName."/".$file_name);
                $apt = move_uploaded_file($_FILES['image']['tmp_name'][$i], $path);
                if ($apt) {
                    $sql_file = "INSERT INTO file VALUE(NULL,$last_id,'$image','$file_extension',1)";
                    if (mysqli_query($con, $sql_file)) {
                    }
                }
            }
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
