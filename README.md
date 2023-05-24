<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Projects
Project ini dibuat untuk menyelesaikan Technical Test dari Sekawan Media.

## Installation

Clone repo berikut

    git clone https://github.com/Saident/Sekawan_Intern.git

Buat env file dan set up DB connection

    cp .env.example .env

Install packages

    composer install

Generate key

    php artisan key:generate

Run migrations dengan seeder

    php artisan migrate --seed

## Specification

MySQL Version : 
    MariaDB 10.4.28

PHP Version :
    PHP 8.2.4 (VS16 X86 64bit thread safe)

Framework :
    Laravel Framework 9.52.7

## Account

User
- User1 : user1@email.com
- User2 : user2@email.com

Admin
- Admin1 : admin1@email.com
- Admin2 : admin2@email.com

Default password : 12345678

## Panduan
Routes awal untuk pihak penyetuju

    http://127.0.0.1:8000/login

Routes awal untuk admin

    http://127.0.0.1:8000/admin/login

Admin dashboard dapat diakses pada

    http://127.0.0.1:8000/admin/

Admin dashboard dapat digunakan untuk pemesanan kendaraan dan export data. Kendaraan yang telah dipesan akan masuk ke request pihak yang telah ditentukan.

Pihak penyetuju dashboard dapat diakses pada

    http://127.0.0.1:8000/dashboard dapat diakses setelah login

Pada dashboard pihak penyetuju dapat melakukan konfirmasi, setuju, atau penolakan terhadap order kendaraan

## Physical Data Model

Physical data model dapat dilihat pada link berikut : https://drive.google.com/file/d/1f6wstZqYDwTC7EttI6bcyYRU9RtUNcBh/view?usp=sharing 

## License

The Project is software licensed under the [MIT license](https://opensource.org/licenses/MIT).
