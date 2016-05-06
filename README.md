# CMS - based on Laravel
## Installation
	composer create-project qtvhao/Laravel-CMS --prefer-dist
	composer install --no-dev
Now, edit .env with your database connection info
```
php artisan migrate
```
and you can seeding example data
```
php artisan db:seed
```
