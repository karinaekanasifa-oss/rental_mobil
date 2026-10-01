<?php

// Memasukkan file koneksi database agar class ini bisa terhubung ke MySQL
require_once 'database/connection.php';

// Membuat class bernama 'Penyewaan' untuk mengelola data transaksi sewa mobil secara OOP
class Penyewaan
{
    // Properti privat untuk menampung koneksi database
    private $conn;

    // Method constructor yang otomatis jalan saat class 'Penyewaan' dipanggil/diinisialisasi
    public function __construct()
    {
        // Membuat objek baru dari class Database yang ada di file connection.php
        $database = new Database();
        
        // Mengambil koneksi database dan menyimpannya ke dalam variabel $conn milik class ini
        $this->conn = $database->conn;
    }

    // Method (fungsi) untuk menambah data penyewaan baru ke database dengan 4 parameter inputan
    public function tambah(
        $id_user,
        $id_kendaraan,
        $tanggal_mulai,
        $tanggal_selesai,
    ) {

        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input id_user
        $var_id_user = mysqli_real_escape_string(
            $this->conn,
            $id_user
        );
        
        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input id_kendaraan
        $var_id_kendaraan = mysqli_real_escape_string(
            $this->conn,
            $id_kendaraan
        );
        
        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input tanggal_mulai sewa
        $var_tanggal_mulai = mysqli_real_escape_string(
            $this->conn,
            $tanggal_mulai
        );
        
        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input tanggal_selesai sewa
        $var_tanggal_selesai = mysqli_real_escape_string(
            $this->conn,
            $tanggal_selesai
        );

        // Menulis perintah SQL (Query) untuk memasukkan data transaksi ke dalam tabel 'penyewaan'
        $query = "INSERT INTO penyewaan 
                  (id_user, id_kendaraan, tanggal_mulai, tanggal_selesai)
                  VALUES (
                  '$var_id_user',
                  '$var_id_kendaraan',
                  '$var_tanggal_mulai',
                  '$var_tanggal_selesai'
                  )";

        // Menjalankan query ke database dan mengembalikan hasilnya (true jika berhasil, false jika gagal)
        return mysqli_query($this->conn, $query);
    }
}