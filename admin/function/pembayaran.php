<?php

// Memasukkan file koneksi database agar class ini dapat terhubung ke MySQL
require_once 'database/connection.php';

// Membuat class bernama 'Pembayaran' untuk mengelola data pembayaran secara OOP (Object Oriented Programming)
class Pembayaran
{
    // Properti privat untuk menampung koneksi database
    private $conn;

    // Method constructor yang otomatis jalan saat class 'Pembayaran' dipanggil/diinisialisasi
    public function __construct()
    {
        // Membuat objek baru dari class Database yang ada di file connection.php
        $database = new Database();
        
        // Mengambil koneksi database dan menyimpannya ke dalam variabel $conn milik class ini
        $this->conn = $database->conn;
    }

    // Method (fungsi) untuk menambah data pembayaran baru ke database dengan 3 parameter inputan
    public function tambah(
        $id_penyewaan,
        $total_bayar,
        $status
    ) {

        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input id_penyewaan
        $var_id_penyewaan = mysqli_real_escape_string(
            $this->conn,
            $id_penyewaan
        );
        
        // Mencegah celah SQL Injection pada input total_bayar
        $var_total_bayar = mysqli_real_escape_string(
            $this->conn,
            $total_bayar
        );
        
        // Mencegah celah SQL Injection pada input status pembayaran
        $var_status = mysqli_real_escape_string(
            $this->conn,
            $status
        );

        // Menulis perintah SQL (Query) untuk memasukkan data ke dalam tabel 'pembayaran'
        $query = "INSERT INTO pembayaran 
                  (id_penyewaan, total_bayar, status)
                  VALUES (
                  '$var_id_penyewaan', '$var_total_bayar', '$var_status'
                  )";

        // Menjalankan query ke database dan mengembalikan hasilnya (true jika berhasil, false jika gagal)
        return mysqli_query($this->conn, $query);
    }
}