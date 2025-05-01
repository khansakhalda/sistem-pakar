
# Sistem Informasi Penyakit & Deteksi ISPA Klinis

SIPDIK adalah aplikasi berbasis web yang membantu masyarakat umum dalam mendeteksi dini penyakit Infeksi Saluran Pernapasan Akut (ISPA) menggunakan metode Certainty Factor sebagai dasar sistem pendukung keputusannya. Aplikasi ini memungkinkan pengguna untuk menginput gejala dan kondisi, lalu memberikan hasil diagnosis sementara beserta tingkat kepastian berdasarkan input tersebut.

Fitur Utama:

- Deteksi dini penyakit ISPA berdasarkan gejala yang dimasukkan pengguna.
- Sistem Pendukung Keputusan berbasis metode Certainty Factor untuk menghitung tingkat kepercayaan diagnosa.
- Chatbot interaktif yang membantu pengguna dalam memahami dan menggunakan aplikasi.

Tujuan: Menyediakan alat bantu sederhana yang berbasis teknologi untuk masyarakat umum dalam mengenali gejala ISPA dengan mandiri, mudah dan cepat.


## Installation


### Clone Repository
git clone https://github.com/razorzero0/sistem-pakar-ispa-certainly-factor-laravel

### Masuk ke Direktori
cd sistem-pakar-ispa-certainly-factor-laravel

### Instal Dependensi
composer install

### Buat File Environment
cp .env.example .env

### Konfigurasi Environment
 Sesuaikan pengaturan database (nama database, username, password) di file .env

### Generate App Key
php artisan key:generate

### Jalankan Migrasi Database
php artisan migrate

### Menjalankan Database Seeder
php artisan db:seed

### Link Storage
php artisan storage:link

### Menjalankan Server
php artisan serve



## Requirments

- PHP Version 8.x

- mysql


## URL

- http://sipdik.online

## Publikasi 

- https://ojs.ft.uniska-kediri.ac.id/index.php/neiit/article/view/68
