# Sales Control - Laravel API

## Objective

The goal of this project is to develop an API for regional and national sales control, allowing salespeople to register their sales through mobile devices and managers and directors to monitor their teams' and units' performance via a web browser.

## Technologies Used

- Laravel 10: PHP framework for API development.
- MySQL: Database for information storage.
- Docker: Development and production environment.

## How to test

### Requirements
#### Easy start with XAMPP:
- [XAMPP](https://www.apachefriends.org/pt_br/index.html) - This will install PHP and MySQL. It will also offer other options, but stick to these two
#### Install all yourself
- [PHP 8.1](https://www.php.net/downloads)
- [MySQL](https://dev.mysql.com/doc/mysql-getting-started/en/)

### Steps to tun
- Clone the repository and enter the folder with your terminal
- Start MySQL's service (with XAMPP you can just click `start` in the GUI)
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Start the serve with `php artisan serve`

## License

Software licensed under the [MIT license](https://opensource.org/licenses/MIT).
