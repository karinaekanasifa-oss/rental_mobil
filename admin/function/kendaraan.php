<?php

// Memasukkan file koneksi database agar class ini bisa terhubung ke MySQL
require_once 'database/connection.php';

// Membuat class bernama 'Kendaraan' untuk mengelola data kendaraan (OOP / Object Oriented Programming)
class Kendaraan
{
    // Properti privat untuk menyimpan objek koneksi database
    private $conn;

    // Method constructor yang otomatis dijalankan saat class ini dipanggil/diinisialisasi
    public function __construct()
    {
        // Membuat objek baru dari class Database (yang ada di file connection.php)
        $database = new Database();
        
        // Mengambil koneksi database dan menyimpannya ke variabel $conn milik class ini
        $this->conn = $database->conn;
    }

    // Method (fungsi) untuk menambah data kendaraan baru ke database dengan 4 parameter inputan
    public function tambah(
        $id_kategori,
        $nama_kendaraan,
        $harga_sewa,
        $status
    ) {

        // Mencegah celah keamanan SQL Injection dengan membersihkan karakter khusus pada input id_kategori
        $var_id_kategori = mysqli_real_escape_string(
            $this->conn,
            $id_kategori
        );
        
        // Mencegah celah keamanan SQL Injection pada input nama_kendaraan
        $var_nama_kendaraan = mysqli_real_escape_string(
            $this->conn,
            $nama_kendaraan
        );
        
        // Mencegah celah keamanan SQL Injection pada input harga_sewa
        $var_harga_sewa = mysqli_real_escape_string(
            $this->conn,
            $harga_sewa
        );
        
        // Mencegah celah keamanan SQL Injection pada input status kendaraan
        $var_status = mysqli_real_escape_string(
            $this->conn,
            $status
        );

        // Menulis perintah SQL (Query) untuk memasukkan data baru ke tabel 'kendaraan'
        $query = "INSERT INTO kendaraan 
                  (id_kategori, nama_kendaraan, harga_sewa, status)
                  VALUES (
                  '$var_id_kategori',
                  '$var_nama_kendaraan',
                  '$var_harga_sewa',
                  '$var_status'
                  )";

        // Menjalankan query ke database dan mengembalikan hasil (bernilai true jika berhasil, false jika gagal)
        return mysqli_query($this->conn, $query);
    }
}