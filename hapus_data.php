<?php
$id_barang=$_GET['id_barang'];
$konek = mysqli_connect("localhost", "root", "","barang");
$query = mysqli_query($konek, "DELETE FROM data_barang WHERE id_barang='".$id_barang."'" );

if($query)
{
    echo json_encode(array(
        'status' => 'data_terhapus'
    ));
}
else
{
    echo json_encode(array(
        'status' => 'data_gagal_terhapus'
    ));
}
?>