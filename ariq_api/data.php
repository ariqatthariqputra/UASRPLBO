<?php

require_once('connection.php');
if (empty($_GET)) {

    $query = mysqli_query($connection, "SELECT * FROM felyna_cart order by id_barang desc");

    $result = array();

    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'id_barang' => $row['id_barang'],
            'nama_barang' => $row['nama_barang'],
            'harga_barang' => $row['harga_barang'],
            'foto' => $row['foto'],
            'jenis_software' => $row['jenis_software'],
            'database' => $row['database'],
        ));
    }

    echo json_encode(
        array('result' => $result)
    );
} else {
    $query = mysqli_query($connection, "SELECT * FROM felyna_cart where id_barang =" . $_GET['id_barang']);
    $result = array();

    while ($row = $query->fetch_assoc()) {
        $result = array(
            'id_barang' => $row['id_barang'],
            'nama_barang' => $row['nama_barang'],
            'harga_barang' => $row['nama_barang'],
            'foto' => $row['foto'],
            'jenis_software' => $row['jenis_software'],
            'database' => $row['database'],

        );
    }

    echo json_encode(
        $result
    );
}
