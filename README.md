<p align="center">
<a href="https://laravel.com" target="_blank"><img src="./logo-colored.png" width="400" alt="App logo"></a></p>

<h1 align="center">Event Space</h1>  

## Note
If anybody is visiting this project to check my git commits record. I want to point out that I uploaded this project on Git Hub after completing the development process. 
I didn't use git while developing this project because I had to submit it to the university and we were not allowed to use any extra tools except the allowed ones. 


## About 

Event space is an application that facilitates its user with knowledge of upcoming events related to their interest them

## App Details

- Language: PHP v8.0 
- Framework: Laravel 9
- JS-Framework: VUE 3
- Database: MySQL


## Setup (via provided .sql database backup file )

- Create a database in MySQL with the name "event_management_system".
- import the database .sql file and match PHPMyAdmin credentials in the .env file.
- Check the application code if node_modules and vendor folder are available, if not then run the following commands in the terminal 1. **npm install**, 2. **npm run build**, 3. **composer install**.
- After that before running the application clear your browser cache completely to avoid cache conflicts, for application cache run 1. **php artisan optimize: clear** 2. **composer dump-autoload**.
- then just open the app in the browser using the "php artisan serve" command or with a custom virtual hostname.
- Enjoy app.

## Default Admin credentials (if given database .sql backup file is used)

- 'email' => 'admin@ems.com'
- 'password' => 'ems-2023'


## Setup (Fresh)

- Create a database in MySQL with the name "event_management_system".
- Open project code in your favorite IDE. open the .env file and add database credentials also add pusher and Mailgun account credentials.
- After this run the following commands in the App terminal 
1. **npm install**, 2.**npm run build**, 3.**composer install**, 4.**composer dump-autoload**, 5.**php artisan key:generate**, 6.**php artisan migrate**, 7.**php artisan db:seed** 8. **php artisan serve**.
- Visit the App folder /database/seeder/ for  default login credentials of all Roles e.g, Admin, Event Organizer, User
- Enjoy app.


## Routes
- User can [Register](http://localhost/event-management-system/register) at http://appurl/register
- User can [Login](http://localhost/event-management-system/login)  at http://appurl/login
- Event Organizer can  [Register](http://localhost/event-management-system/eo/register) at http://appurl/eo/register
- Event organizer can [Login](http://localhost/event-management-system/eo/login) at http://appurl/eo/login
- Admin can [Login](http://localhost/event-management-system/admin/login) at http://appurl/admin/login


