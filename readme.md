<p align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
	Bootstrap 4
</p>


## About Laravel Bootstrap 4 Starter Kit

This repository provides you with prebuilt user and admin panel which can directly be used for a quick start in project development.

- Authentication for User and Admin
- Forgot/Reset Password for both User and Admin
- Separate tables for User and Admin
- Email Notifier for new Registrations
- Admin/User Registration with the environment file.
- Cache/Config/Router Cache Clear Option
- Migration control from GUI based interface.
- Database seeder from GUI based interface.
- Production Ready.

Support:-
- Laravel - 5.4.*
- Bootstrap - 4.*

## Setup Instructions:

- Download this repository as it is.
- Inside the machine folder copy .env.example to create .env file.
- Inside the machine folder run 
```php
php artisan key:generate
```  
- Your website should be ready now.

## Backend Setup

- Copy the entire folder to htdocs inside XAMPP folder.
- Change SETUP_ACCESS=0 to SETUP_ACCESS=1 inside .env .
- Start Apache and MySQL in XAMPP and goto 
```bash
http://localhost/folder-name/setup
```
- Provide the appropriate credentials and database name.
- Your backend setup is now ready.

### Front-end
- Goto machine folder.
```bash
npm i
npm run hot
```
- Your frontend setup is now ready for development. For production use:
```bash
npm run prod
```

### Admin Access

- Can be accessed using the /adminRoute
- Manage Users Hassle Free. Search Users.