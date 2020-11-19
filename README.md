# CSE Waiting List

## Installation Guide

### Items required

- Composer
- Laravel
- XAMPP (or some other form of database storage)
- A text editor

### Create the environment 

1. First, pull down the project from the Github repository link.
1. Edit the .env file so that the database information reflects your database
1. Launch XAMPP and run Apache and MySQL
1. Navigate to the folder location and run the following command

        composer install

    This will install Laravel onto the project directory.
1. After Laravel has been installed, execute the following commands to structure the database.

        php artisan migrate
        php artisan db:seed

    This will fill the database with the necessary tables and insert some data into the users and courses table for testing.
    In the event that there is a database error or the unlikely case that the seeder randomly chooses the same number twice, run the following line

        php artisan migrate:rollback

    and then the two above lines afterwards.

1. Ensure that the database tables are all properly created and the users and courses tables are filled with some data.

### Launching and using the test server

1. To launch a Laravel test server on the project, execute this command.

        php artisan serve

1. Ensure that XAMPP is running so that database connections are being made.

1. To log in, use PHPMyAdmin to view the users table and copy any email given. Enter the chosen email and the password 'password'.

1. After logging in, the first page redirected to should be the dashboard page. On this page, any of the options are available for usage.
