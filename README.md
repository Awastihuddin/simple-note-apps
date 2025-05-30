# Aplikasi Catatan Instan

Aplikasi Catatan Instan adalah aplikasi berbasis web yang memungkinkan pengguna untuk membuat, melihat, mengedit, dan menghapus catatan. Aplikasi ini mengimplementasikan operasi **CRUD (Create, Read, Update, Delete)** dengan menggunakan **PHP**, **MySQL**, dan **HTML/CSS/JavaScript** untuk antarmuka pengguna yang responsif.

## Deskripsi

Aplikasi ini memungkinkan pengguna untuk:

* Menambahkan catatan baru
* Melihat daftar catatan yang telah dibuat
* Mengedit catatan yang sudah ada
* Menghapus catatan
* Menyortir catatan berdasarkan kriteria seperti tanggal dan judul

Aplikasi ini dirancang dengan antarmuka pengguna yang sederhana dan mudah digunakan serta responsif untuk perangkat desktop dan mobile.

## Fitur Utama

* **Penyortiran Catatan**: Mengurutkan catatan berdasarkan tanggal (terbaru atau terlama) atau berdasarkan judul (A-Z atau Z-A).
* **Antarmuka Kalender**: Mengintegrasikan kalender untuk membantu pengguna merencanakan kegiatan.
* **Responsive Design**: Tampilan yang menyesuaikan dengan ukuran layar perangkat (mobile dan desktop).
* **CRUD Operations**: Mengelola catatan dengan operasi CRUD lengkap (tambah, edit, hapus).

## Teknologi yang Digunakan

* **PHP**: Backend untuk mengelola logika aplikasi dan interaksi dengan database.
* **MySQL**: Database untuk menyimpan catatan pengguna.
* **HTML/CSS/JavaScript**: Untuk antarmuka pengguna (UI) dan interaktivitas.
* **FontAwesome**: Ikon untuk antarmuka pengguna yang lebih menarik.

## Instalasi dan Persyaratan

### 1. **Persyaratan Sistem**

Pastikan Anda memiliki perangkat dan perangkat lunak berikut:

* **Web Server**: Apache atau Nginx
* **PHP**: Versi 7.4 atau lebih tinggi
* **MySQL**: Untuk database
* **Browser**: Chrome, Firefox, atau browser modern lainnya

### 2. **Langkah Instalasi**

1. **Clone repositori ini**

   ```bash
   git clone https://github.com/username/note-app.git
   ```

2. **Siapkan Database**

   * Masuk ke MySQL dan buat database `note_app`:

     ```sql
     CREATE DATABASE note_app CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
     ```
   * Import file SQL untuk membuat tabel `notes`:

     ```sql
     CREATE TABLE notes (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       content TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

3. **Konfigurasi Koneksi Database**

   * Di file `config.php`, pastikan Anda telah mengonfigurasi kredensial database yang benar:

     ```php
     $pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     ```

4. **Jalankan Aplikasi**

   * Pastikan web server Anda berjalan dan arahkan ke **index.php** di browser Anda.

## Penggunaan

1. **Menambah Catatan Baru**

   * Klik tombol **Tambah Catatan Baru** untuk membuka form dan menambahkan catatan baru.

2. **Melihat Daftar Catatan**

   * Catatan yang sudah ditambahkan akan tampil di halaman utama dalam daftar. Setiap catatan akan menampilkan judul dan waktu pembuatan. Klik judul untuk melihat detail catatan.

3. **Mengedit dan Menghapus Catatan**

   * Setiap catatan memiliki tombol untuk mengedit dan menghapus. Mengedit catatan akan membuka form dengan data yang sudah ada. Hapus catatan dengan konfirmasi untuk menghindari kesalahan.

4. **Menyortir Catatan**

   * Gunakan dropdown untuk memilih kriteria penyortiran (Tanggal Terbaru, Tanggal Terlama, Judul A-Z, Judul Z-A). Halaman akan memuat ulang dengan catatan yang disortir sesuai pilihan Anda.

## Lisensi

Proyek ini dilisensikan di bawah **MIT License** – lihat file `LICENSE` untuk detail lebih lanjut.

## Referensi

* [PHP Manual](https://www.php.net/manual/en/)
* [MySQL Documentation](https://dev.mysql.com/doc/)
* [FontAwesome](https://fontawesome.com/)

