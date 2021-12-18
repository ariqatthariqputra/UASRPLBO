<?php

require_once('connection.php');

$id = $_GET['id_user'];

//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
$sql = "SELECT * FROM user WHERE id_user=$id";

//Mendapatkan Hasil 
$r = mysqli_query($con, $sql);

//Memasukkan Hasil Kedalam Array
$result = array();
$row = mysqli_fetch_array($r);
array_push($result, array(
    'username' => $row['username'],
    'nama_lengkap' => $row['nama_lengkap'],
    'email' => $row['email'],
    'alamat' => $row['alamat'],
    'jenis_kelamin' => $row['jenis_kelamin']
));

//Menampilkan dalam format JSON
echo json_encode(array('result' => $result));

mysqli_close($con);
