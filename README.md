# E-Yudisium

## About

Aplikasi web ini saya buat untuk kampus khususnya bagian administrasi akademik ketika kerja praktek.
Seperti namanya, aplikasi ini meng-handle proses dari Yudisium yang mana prosesnyanya yaitu upload berkas lalu di verifikasi oleh admin yang bersangkutan sehingga bisa dilakukan melalui internet.

Aplikasi ini menggunakan PHP full-stack web framework yaitu [CodeIgniter 4](https://codeigniter.com), lalu [SB Admin 2](https://github.com/startbootstrap/startbootstrap-sb-admin-2) sebagai template HTML CSS JavaScript-nya dan MySQL sebagai database.

## Install

Jika komputer anda belum terintsall [composer](https://getcomposer.org/download/), silakan install terlebih dahulu.

Saya sarankan menggunakan [XAMPP](https://www.apachefriends.org/download.html) sebagai web server dengan PHP versi 7.3 ke atas.

- Setelah di clone, pindahkan file foldernya ke folder `xampp/htdocs`.

- Buka foldernya dengan code editor, lalu rename file `env` pada folder root menjadi `.env` lalu sesuaikan database-nya, biarkan saja jika tidak ingin merubah apapun.

- Selanjutnya buka CLI atau terminal pada folder ini, lalu ketik `composer update` dan enter. Proses `composer update` tergantung dari koneksi internet, tetapi ini tidak akan lama.

- Setelah selesai, copy file **spark** yang ada di `vendor/codeigniter4/framework/spark` ke folder root.

- Lalu copy juga file **index.php** yang ada di `vendor/codeigniter4/framework/public/index.php` ke folder `public/`.

- Aktifkan Apache dan MySQL pada XAMPP-nya, lalu buka [localhost/phpmyadmin](http://localhost/phpmyadmin) pada browser. Buat database baru sesuai dengan nama database pada file `.env` tadi yaitu `eyudisium`.

- Buka lagi terminal pada folder project ini lalu ketik `php spark migrate` dan enter. Ini akan me-migrasikan semua table yang dibutuhkan.

- Selanjutnya `php spark db:seed CountdownSeeder`, lalu `php spark db:seed DosenSeeder`, `php spark db:seed MahasiswaSeeder` dan `php spark db:seed UsersSeeder`, secara bergantian. Proses ini akan mengisi table Countdown, Dosen, Mahasiswa dan Users.

- Terkahir `php spark serve`, lalu biarkan terminal-nya berjalan. Silakan buka [localhost:8080](http://localhost:8080) pada browser untuk menjalankan web-nya.

## Running







<!---## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)]:--->
