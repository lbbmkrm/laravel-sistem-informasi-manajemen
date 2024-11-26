## Azka Ponsel

Project ini bertujuan untuk memanajamen sistem penjualan kartu internet pada toko azka ponsel.

## Description

Dengan project ini diharapkan dapat membantu proses pencatatan penjualan di toko azka ponsel yang selama ini mengalami
masalah dalam melakukan perhitungan yang diakibatkan lamanya proses pencatatan yang disebabkan penggunaan cara konvensional dengan menggunakan buku sehingga pekerja perlu melakukan perhitungan secara manual dari buku. Project ini memiliki 2 role otorisasi yang memiliki kemampuan berbeda.

## Feature

-   Dashboard
    User dapat melihat seluruh data penjualan, pendapatan, jumlah kartu dan jumlah provider.

-   Profile
    User dapat melihat seluruh akun yang ada pada sistem ini.
    Admin : Melihat, menambah, menghapus, mengedit data.
    Member : Melihat, menambah data,

-   Customer
    User dapat melihat daftar customer, handphone dan alamat dari customer
    Admin : Melihat, menambah, menghapus, mengedit data.
    Member : Melihat, menambah data,

-   Provider
    User dapat melihat apa saja provider yang ada pada toko
    Admin : Melihat, menambah, menghapus, mengedit data.
    Member : Melihat, menambah data,

-   Card
    User dapat melihat kartu internet apa saja yang dijual
    Admin : Melihat, menambah, menghapus, mengedit data.
    Member : Melihat, menambah data,

-   Sale
    User dapat melihat daftar transaksi/penjualan melihat total, nama customer, siapa yang melakukan penjualan tersebut
    Admin : Melihat, menambah, menghapus, mengedit data.
    Member : Melihat, menambah data,

## Installation

    - git clone https://github.com/lbbmkrm/laravel-sistem-informasi-manajemen.git
    - cd *azka-ponsel
    - composer install
    - *buat file .env dengan file .env.example dan konfigurasi
    - php artisan migrate
    - php artisan serve
