<?php
require_once 'connection.php';

if ($con) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $size = $_POST['size'];
    $jumlah = $_POST['jumlah'];

    $insert = "INSERT INTO data_barang(kode_barang, nama_barang, size, jumlah) VALUES('$kode_barang','$nama_barang','$size','$jumlah')";
    
    if($kode_barang != "" && $nama_barang != "" && $size !="" && $jumlah !="") {
        $result = mysqli_query($con, $insert);
        $response = array();

        if ($result){
            array_push($response, array(
                'status' => 'OK'
            ));
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }
} else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);
?>