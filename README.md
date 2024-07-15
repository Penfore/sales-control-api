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
- [XAMPP](https://www.apachefriends.org/pt_br/index.html) - This will install PHP and MySQL. It will also offer other options, but stick to these two.
- Add PHP to your PATH
- [Composer](https://getcomposer.org/download/)
#### Install all yourself
- [PHP 8.1](https://www.php.net/downloads)
- [MySQL](https://dev.mysql.com/doc/mysql-getting-started/en/)
- Add PHP to your PATH
- [Composer](https://getcomposer.org/download/)
#### Configure required extensions
- Download [this file](https://gist.github.com/Penfore/07209736991285c8b565922aef95b0ff)
- Open your terminal where the file is located
- Run `php check.php` - This will show if you have the appropriate setup and will also display the location of your `.ini` file. You might miss some extensions. See the next step.
- Open the `.ini` file displayed with your editor of choice. You will remove the comment tag (; in the beginning of the line) from the following extensions:
  - `gd`
  - `zip`
  - `pdo_mysql`
- Run `php check.php` again and all should be fine.

### Steps to tun
- Clone the repository and enter the folder with your terminal
- Start MySQL's service (with XAMPP you can just click `start` in the GUI)
- Download the [.env file](https://drive.proton.me/urls/RZNWDCCX88#XDCwWqoq6IEc) with the database configured for testing (If you already have a database setup you might need to adapt with your settings) and put it inside the project folder
- Run `composer install` to install all dependencies
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Start the serve with `php artisan serve`

### Testing
- You will need to have [Postman](https://www.postman.com/downloads/) installed in order to go through the next steps
- Download the [collections and environments](https://drive.proton.me/urls/Y3JY2YBEMM#aIlsB3nnSuLy) and [import](https://learning.postman.com/docs/getting-started/importing-and-exporting/importing-data/) it to Postman. This will have the routes and documentation.
- Happy testing! :D

## License

Software licensed under the [MIT license](https://opensource.org/licenses/MIT).
