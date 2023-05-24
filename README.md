<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Projects

## Installation

Clone this repo

    git clone https://github.com/Saident/Sekawan_Intern.git

Create env file and set up your DB connection

    cp .env.example .env

Install packages

    composer install

Generate key

    php artisan key:generate

Run migrations without admins/users

    php artisan migrate

Or run migrations with admins/users

    php artisan migrate --seed

Default password for admin and users is "password"

## Account

User
    - User1 : user1@email.com
    - User2 : user2@email.com

Admin
    - Admin1 : admin1@email.com
    - Admin2 : admin2@email.com

Default password : 12345678

## License

The Project is software licensed under the [MIT license](https://opensource.org/licenses/MIT).
