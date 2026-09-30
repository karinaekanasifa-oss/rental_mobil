<?php

require_once 'database/connection.php';

class Peminjam
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function tambah(
        $nama,
        $alamat,
        $no_hp
    ) {

        $var_nama = mysqli_real_escape_string(
            $this->conn,
            $nama
        );
        $var_alamat = mysqli_real_escape_string(
            $this->conn,
            $alamat
        );
        $var_no_hp = mysqli_real_escape_string(
            $this->conn,
            $no_hp
        );

        $query = "INSERT INTO peminjam 
                  (nama, alamat, no_hp)
                  VALUES (
                  '$var_nama', '$var_alamat', '$var_no_hp'
                  )";

        return mysqli_query($this->conn, $query);
    }
}