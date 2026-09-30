<?php

require_once 'database/connection.php';

class Penyewaan
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function tambah(
        $id_user,
        $id_kendaraan,
        $tanggal_mulai,
        $tanggal_selesai,
    ) {

        $var_id_user = mysqli_real_escape_string(
            $this->conn,
            $id_user
        );
        $var_id_kendaraan = mysqli_real_escape_string(
            $this->conn,
            $id_kendaraan
        );
        $var_tanggal_mulai = mysqli_real_escape_string(
            $this->conn,
            $tanggal_mulai
        );
        $var_tanggal_selesai = mysqli_real_escape_string(
            $this->conn,
            $tanggal_selesai
        );

        $query = "INSERT INTO penyewaan 
                  (id_user, id_kendaraan, tanggal_mulai, tanggal_selesai)
                  VALUES (
                  '$var_id_user',
                  '$var_id_kendaraan',
                  '$var_tanggal_mulai',
                  '$var_tanggal_selesai'
                  )";

        return mysqli_query($this->conn, $query);
    }
}