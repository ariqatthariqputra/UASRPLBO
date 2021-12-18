<?php

require_once('connection.php');
if (empty($_GET)) {

    $query = mysqli_query($con, "SELECT * FROM barang order by id_barang desc");

    $result = array();

    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'id_barang' => $row['id_barang'],
            'nama_barang' => $row['nama_barang'],
            'hargabeli_barang' => $row['hargabeli_barang'],
            'hargajual_barang' => $row['hargajual_barang'],
            'jumlah' => $row['jumlah'],
            'entry_by' => $row['entry_by'],
        ));
    }

    echo json_encode(
        array('result' => $result)
    );
} else {
    $query = mysqli_query($con, "SELECT * FROM barang where id_barang =" . $_GET['id_barang']);
    $result = array();

    while ($row = $query->fetch_assoc()) {
        $result = array(
            'id_barang' => $row['id_barang'],
            'nama_barang' => $row['nama_barang'],
            'hargabeli_barang' => $row['hargabeli_barang'],
            'hargajual_barang' => $row['hargajual_barang'],
            'jumlah' => $row['jumlah'],
            'entry_by' => $row['entry_by'],
        );
    }

    echo json_encode(
        $result
    );
}
