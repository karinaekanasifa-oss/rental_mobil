<?php

// Memasukkan file koneksi database agar class ini bisa terhubung ke MySQL
require_once 'database/connection.php';

// Membuat class bernama 'Peminjam' untuk mengelola data peminjam menggunakan konsep OOP (Object Oriented Programming)
class Peminjam
{
    // Properti privat untuk menampung objek koneksi database
    private $conn;

    // Method constructor yang otomatis berjalan saat class 'Peminjam' dipanggil/diinisialisasi
    public function __construct()
    {
        // Membuat objek baru dari class Database yang ada di file connection.php
        $database = new Database();
        
        // Mengambil koneksi database dan menyimpannya ke dalam variabel $conn milik class ini
        $this->conn = $database->conn;
    }

    // Method (fungsi) untuk menambah data peminjam baru ke database dengan 3 parameter inputan
    public function tambah(
        $nama,
        $alamat,
        $no_hp
    ) {

        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input nama
        $var_nama = mysqli_real_escape_string(
            $this->conn,
            $nama
        );
        
        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input alamat
        $var_alamat = mysqli_real_escape_string(
            $this->conn,
            $alamat
        );
        
        // Mencegah celah SQL Injection dengan membersihkan karakter khusus pada input no_hp
        $var_no_hp = mysqli_real_escape_string(
            $this->conn,
            $no_hp
        );

        // Menulis perintah SQL (Query) untuk memasukkan data ke dalam tabel 'peminjam'
        $query = "INSERT INTO peminjam 
                  (nama, alamat, no_hp)
                  VALUES (
                  '$var_nama', '$var_alamat', '$var_no_hp'
                  )";

        // Menjalankan query ke database dan mengembalikan hasilnya (true jika berhasil, false jika gagal)
        return mysqli_query($this->conn, $query);
    }
}