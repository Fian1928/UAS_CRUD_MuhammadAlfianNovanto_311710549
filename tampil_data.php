<?php
include('connection.php');
$query = 'select id_barang id_barang, kode_barang kode_barang, nama_barang nama_barang , size size , jumlah jumlah from data_barang';
$result = mysqli_query($con,$query) or die(mysqli_error());
$data = array();
while($row = mysqli_fetch_object($result)){
    $data['DataBarang'][]=$row;
}
echo json_encode($data);
?>