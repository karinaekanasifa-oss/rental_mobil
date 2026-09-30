<?php

require_once __DIR__ . '../database/connection.php';

class Kategori
{
    private $conn;
    
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function tambah(
        $id,
        $kategori
    ) {
        // mysqli_real_escape_string untuk escept karakter khusus agar tidak terjadi sql injection
        $var_id = mysqli_real_escape_string(
            $this->conn,
            $id
        );

        $var_kategori = mysqli_real_escape_string(
            $this->conn,
            $kategori
        );

      //values utk menambahkan data ke dalam tabel kategori , apa yg mau di isi-->
      // yg di dalem itu kolomnya
        $query = "INSERT INTO kategori
                  (id, kategori)
                  VALUES (  
                      '$var_id',
                      '$var_kategori',
                  )";

        return mysqli_query($this->conn, $query);
    }
}