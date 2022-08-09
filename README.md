# E-Yudisium

Aplikasi web yang meng-handle proses dari Yudisium ini saya buat untuk kampus khususnya bagian administrasi akademik ketika kerja praktek.

Pada aplikasi ini terdapat 4 level user, yaitu Admin Akademik, Admin Fakultas, Admin Prodi dan Mahasiswa.

Alur dari aplikasi ini adalah sebagai berikut:
+ Admin menginput NPM mahasiwa.
+ Admin fakultas menetapkan batas waktu periode yudisium
+ Mahasiswa bisa melakukan pencarian NPM jika sudah terdaftar kemudian mengupload berkas awal yang diperlukan.
+ Admin akademik akan membuatkan akun untuk mahasiswa tersebut. Admin akademik juga yang berhak membuatkan akun untuk admin fakultas dan prodi.
+ Mahasiswa login lalu mengupload berkas lain yang dibutuhkan untuk proses Yudisium, lalu mengajukan yudisium jika masih dalam periode.
+ Berkas mahasiswa akan diperiksa dimulai dari Admin Prodi sesuai prodi mahasiswa, lalu Admin Fakultas sesuai fakultas mahasiswa, Admin Akademik semua mahasiswa lalu kembali lagi ke Admin Fakultas.
+ Jika berkas masih keliru, mahasiswa akan diberi tahu lalu mengupload lagi berkas yang keliru.
+ Jika tidak, maka mahasiswa lolos proses yudisium.

## About

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

![Screenshot (563)](https://user-images.githubusercontent.com/67651472/183603342-fcd01082-1ae0-44ab-87af-a2405a130105.png)

Web-nya akan tampil seperti ini.

Users ada 3 yaitu:
+ Admin BAAk dengan `username: adminbaak dan password: adminbaak123`.
+ Admin Fakultas Sains dan Teknologi dengan `username: adminsaintek dan password: adminsaintek123`.
+ Admin Prodi Informatika dengan `username: admininformatika dan password: admininformatika123`.

Untuk mahasiswa ada 1 dengan NPM `12345678901`.

Untuk countdown-nya atau batas waktu periode yaitu hari ini, di-insert dengan `now()` dari PHP. Bisa diubah dengan membuat akun untuk fakultas Bisnis, FKIP dan Pertanian.

## More

Jika ingin menghubungi atau menanyakan tentang project ini bisa lewat moh.adrian11@gmail.com, lewat DM [Instagram](https://instagram.com/adrian.vengeance) atau lewat [Telegram](https://t.me/apaitusername).

<!---## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)]:--->
