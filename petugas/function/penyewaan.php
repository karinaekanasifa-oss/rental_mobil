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
        $id_
    )
}
?>