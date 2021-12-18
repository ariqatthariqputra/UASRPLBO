<?php
include_once "connection.php";

class usr
{
}


$nama_barang = $_POST["nama_barang"];
$hargabeli_barang = $_POST["hargabeli_barang"];
$pendapatan = $hargabeli_barang * 10 / 100;
$hargajual_barang = $hargabeli_barang + $pendapatan;
$jumlah = $_POST["jumlah"];
$entry_by = $_POST["entry_by"];

if ((empty($nama_barang))) {
    $response = new usr();
    $response->success = 0;
    $response->message = "Kolom nama tidak boleh kosong";
    die(json_encode($response));
} else if ((empty($hargabeli_barang))) {
    $response = new usr();
    $response->success = 0;
    $response->message = "Kolom harga beli tidak boleh kosong";
    die(json_encode($response));
} else if ((empty($hargajual_barang))) {
    $response = new usr();
    $response->success = 0;
    $response->message = "Kolom harga jual tidak boleh kosong";
    die(json_encode($response));
} else if ((empty($jumlah))) {
    $response = new usr();
    $response->success = 0;
    $response->message = "Kolom jumlah jual tidak boleh kosong";
    die(json_encode($response));
} else {
    $num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM barang WHERE nama_barang='" . $nama_barang . "'"));

    if ($num_rows == 0) {
        $query = "INSERT INTO barang(nama_barang, hargabeli_barang, hargajual_barang,jumlah,entry_by)   values ('$nama_barang','$hargabeli_barang','$hargajual_barang','$jumlah', '$entry_by')";
        $sql = mysqli_query($con, $query);

        if ($sql) {
            $response = new usr();
            $response->success = 1;
            $response->message = "Barang berhasil di insert";
            die(json_encode($response));
        } else {
            $response = new usr();
            $response->success = 0;
            $response->message = "Barang gagal insert";
            die(json_encode($response));
        }
    } else {
        $response = new usr();
        $response->success = 0;
        $response->message = "Barang sudah ada";
        die(json_encode($response));
    }
}

mysqli_close($con);
