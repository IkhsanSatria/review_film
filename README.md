# Project Review Film

## Pendahuluan
Proyek ini adalah aplikasi berbasis web untuk melakukan review film. Dibangun menggunakan **CodeIgniter 4** dan menggunakan **phpMyAdmin** sebagai manajemen database.

## Prasyarat
Sebelum menginstal dan menjalankan proyek ini, pastikan Anda telah menginstal perangkat lunak berikut:

- **PHP** (versi 8.0 atau lebih baru)
- **Composer** (untuk mengelola dependensi PHP)
- **CodeIgniter 4** (framework utama)
- **MySQL** atau **MariaDB** (untuk database)
- **phpMyAdmin** (opsional, untuk manajemen database)
- **Node.js & NPM** (untuk menjalankan frontend jika diperlukan)

## Instalasi
Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini:

1. **Clone Repository**
   ```sh
   git clone https://github.com/IkhsanSatria/review_film.git
   cd review-film
   ```

2. **Instal Dependensi**
   ```sh
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   ```sh
   cp env .env
   ```
   Lalu, sesuaikan konfigurasi **database** di dalam file `.env`.

4. **Set Key Enkripsi**
   ```sh
   php spark key:generate
   ```

5. **Migrasi Database**
   ```sh
   php spark migrate --seed
   ```
   Opsi `--seed` akan mengisi database dengan data awal.

6. **Jalankan Server**
   ```sh
   php spark serve
   ```
   Aplikasi akan berjalan di `http://localhost:8080/`

---

