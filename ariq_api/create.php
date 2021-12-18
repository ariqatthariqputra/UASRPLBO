<?php

require_once('connection.php');



$json = file_get_contents('php://input');
$data = json_decode($json, true);



$nama_barang = $data['nama_barang'];
$harga_barang = $data['harga_barang'];
$foto = $data['foto_barang'];
$jenis_software = $data['jenis_software'];
$database = $data['nama_database'];
$username = $data['username'];
$slug = $data['slug'];

$query = "INSERT INTO felyna_cart(nama_barang,harga_barang,foto,jenis_software,nama_database,username,slug) values ('$nama_barang','$harga_barang','$foto','$jenis_software','$database', '$username' ,'$slug' )";
$sql = mysqli_query($connection, $query);



if ($sql) {
    $posts['response'] = array("success" => "1", "msg" => "Inserted Successfully");
} else {
    $posts['response'] = array("success" => "0", "msg" => "Not Inserted");
}

echo json_encode($posts);
