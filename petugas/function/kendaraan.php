<?php 

require_once 'database/connection.php';

class Kendaraan
{
  private $conn;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->conn;
  }

  public function tambah(
    $id_kategori,
    $nama_kendaraan,
    $harga_sewa,
    $status
  ){
    $var_id_kategori = mysqli_real_escape_string(
        $this->conn,
        $id_kategori
    );
    $var_nama_kendaraan = mysqli_real_escape_string(
        $this->conn,
        $nama_kendaraan
    );
    $var_harga_sewa = mysqli_real_escape_string(
        $this->conn,
        $harga_sewa
    );
    $var_status = mysqli_real_escape_string(
        $this->conn,
        $status
    );

    $query = "INSERT INTO kendaraan 
           (id_kategori, nama_kendaraan, harga_sewa, status)
           values(
           $var_id_kategori,
           $var_nama_kendaraan,
           $harga_sewa,
           $var_status
           )";

      return mysqli_query($this->conn, $query);
  }

}
?>