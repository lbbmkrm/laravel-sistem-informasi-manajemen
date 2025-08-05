# Toko Kartu Internet - Sistem Informasi Manajemen

Proyek ini adalah studi kasus portofolio yang mendemonstrasikan sebuah Sistem Informasi Manajemen untuk toko kartu internet. Aplikasi ini dibangun dengan framework Laravel dan menggunakan Livewire untuk antarmuka pengguna yang dinamis dan real-time.

## Ringkasan Proyek

Tujuan utama dari aplikasi ini adalah untuk mendigitalkan dan menyederhanakan proses manajemen penjualan dan inventaris pada sebuah toko ritel kartu internet skala kecil. Aplikasi ini menggantikan pencatatan manual berbasis buku dengan sistem yang efisien dan terkelola oleh database. Aplikasi ini juga dilengkapi dengan otorisasi berbasis peran untuk membedakan tingkat akses antara administrator dan staf biasa.

## Fitur Utama

-   **Dashboard**: Menyajikan ringkasan metrik-metrik kunci, termasuk total penjualan, pendapatan (hanya untuk admin), jumlah pelanggan, dan statistik provider.
-   **Manajemen Penjualan**: Mencatat, melihat, memperbarui, dan menghapus transaksi penjualan.
-   **Inventaris Kartu**: Mengelola stok kartu internet, termasuk provider, nama, harga, dan jumlahnya.
-   **Data Pelanggan**: Mengelola database informasi pelanggan (nama, nomor telepon, alamat).
-   **Manajemen Provider**: Melacak berbagai provider layanan internet untuk kartu yang dijual.
-   **Manajemen Pengguna (Admin)**: Admin dapat mengelola akun pengguna, termasuk membuat, mengedit, menghapus pengguna, dan menetapkan peran.
-   **Ekspor Data**: Pengguna dapat mengunduh laporan untuk penjualan, pelanggan, kartu, dan provider.
-   **Kontrol Akses Berbasis Peran**:
    -   **Admin**: Akses penuh untuk CRUD (Create, Read, Update, Delete) di semua modul.
    -   **Member/Pengguna**: Dapat melihat data dan membuat catatan penjualan/pelanggan baru, tetapi tidak dapat mengedit atau menghapus sebagian besar data.

## Teknologi yang Digunakan

-   **Backend**: Laravel 11
-   **Frontend**: Blade, Livewire 3, Bootstrap 5
-   **Database**: MySQL

## Panduan Instalasi

1.  **Clone repositori ini:**

    ```bash
    git clone https://github.com/lbbmkrm/laravel-internet-store.git
    cd laravel-internet-store
    ```

2.  **Instal dependensi:**

    ```bash
    composer install
    npm install
    ```

3.  **Siapkan file environment Anda:**

    -   Salin file contoh environment:
        ```bash
        cp .env.example .env
        ```
    -   Buat kunci aplikasi (application key):
        ```bash
        php artisan key:generate
        ```
    -   Konfigurasikan koneksi database dan pengaturan lainnya di dalam file `.env`. Secara default, proyek ini dikonfigurasi untuk menggunakan MySQL.

4.  **Jalankan migrasi dan seeder database:**

    -   Perintah ini akan membuat tabel-tabel yang diperlukan dan mengisinya dengan data awal (dummy data).

    ```bash
    php artisan migrate --seed
    ```

5.  **Build aset frontend:**

    ```bash
    npm run dev
    ```

6.  **Jalankan server pengembangan:**
    ```bash
    php artisan serve
    ```

Aplikasi akan tersedia di `http://127.0.0.1:8000`.

### Kredensial Login Default

-   **Admin**:
    -   **Email**: `admin@example.com`
    -   **Password**: `password123`
-   **Member/Pengguna**:
    -   **Email**: `user@example.com`
    -   **Password**: `password123`
