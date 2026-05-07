# BlogSystem - Laravel Blog Management System

Sistem manajemen blog yang dibangun menggunakan Laravel 11, dirancang dengan fitur lengkap untuk publikasi artikel, manajemen kategori, dan sistem administrasi yang aman.

## Fitur Utama

- **Manajemen Artikel (CRUD)**: Buat, baca, perbarui, dan hapus artikel dengan mudah.
- **Kategori Dinamis**: Pengelompokan artikel berdasarkan kategori.
- **Sistem Autentikasi**:
  - Registrasi & Login.
  - **Integrasi Socialite**: Login menggunakan Google.
  - **Two-Factor Authentication (2FA)**: Lapisan keamanan tambahan untuk akun pengguna.
- **Dashboard Admin**: Panel kontrol khusus admin untuk mengelola seluruh konten.
- **File Manager**: Integrasi `unisharp/laravel-filemanager` untuk manajemen aset media.
- **SEO Ready**:
  - Generasi Sitemap otomatis menggunakan `spatie/laravel-sitemap`.
  - URL ramah SEO (Slug).
- **Survey System**: Fitur pembuatan dan pengisian survey.
- **DataTables**: Tabel interaktif di panel admin menggunakan `yajra/laravel-datatables`.

## Teknologi yang Digunakan

- **Backend**: Laravel 11.x (PHP 8.2+)
- **Frontend**: Blade Templates, Vite, Tailwind CSS.
- **Database**: MySQL / MariaDB.
- **Package Utama**:
  - `intervention/image` (Manipulasi Gambar)
  - `laravel/socialite` (Social Auth)
  - `spatie/laravel-sitemap` (SEO)
  - `unisharp/laravel-filemanager` (Media Management)
  - `yajra/laravel-datatables` (Admin Tables)

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal:
- PHP >= 8.2
- Composer
- Node.js & NPM
- Database (MySQL/MariaDB)

## Cara Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di lokal:

1. **Clone Repositori**
   ```bash
   git clone https://github.com/michailtjhang/BlogSystem.git
   cd BlogSystem
   ```

2. **Instal Dependensi PHP**
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend**
   ```bash
   npm install
   npm run dev
   ```

4. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Buka file `.env` dan sesuaikan konfigurasi database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=msib7_blog
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   *Jangan lupa untuk mengisi `GOOGLE_CLIENT_ID` dan `GOOGLE_CLIENT_SECRET` jika ingin menggunakan fitur login Google.*

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi dan Seed Database**
   Jalankan migrasi untuk membuat tabel dan seeder untuk data awal (termasuk akun admin):
   ```bash
   php artisan migrate --seed
   ```

7. **Storage Link**
   Hubungkan folder storage ke public agar file media dapat diakses:
   ```bash
   php artisan storage:link
   ```

8. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   Akses proyek di: `http://localhost:8000`

## Akses Admin Default

Setelah menjalankan `php artisan db:seed`, Anda dapat masuk ke panel admin dengan kredensial berikut:

- **URL**: `http://localhost:8000/login`
- **Email**: `admin@example.com`
- **Password**: `password`

*Catatan: Segera ubah password Anda setelah login pertama kali demi keamanan.*

## Lisensi

Proyek ini bersifat open-source dan berlisensi di bawah [MIT license](https://opensource.org/licenses/MIT).
