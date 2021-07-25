<?php
require_once 'connection.php';

if($con) {
    $id_barang = $_POST['id_barang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $size = $_POST['size'];
    $jumlah = $_POST['jumlah'];

    $getData = "SELECT * FROM data_barang WHERE id_barang = '$id_barang'" ;

    if ($kode_barang !="" && $nama_barang !="" && $size !="" && $jumlah != "") {
        $result = mysqli_query($con, $getData);
        $rows = mysqli_num_rows($result);
        $response = array();

        if ($rows > 0) {
            $update = "UPDATE data_barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', size = '$size', jumlah = '$jumlah' WHERE id_barang = '$id_barang'";
            $exequery = mysqli_query($con, $update);

            if ($exequery) {
                array_push($response, array (
                    'status' => 'OK'
                ));
            } else {
                array_push($response, array (
                    'status' => 'FAILED'
                ));
            }
        } else {
            array_push($response, array (
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array (
            'status' => 'FAILED'
        ));
    }
} else {
    array_push($response, array (
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);
?>