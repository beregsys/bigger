## About

This is test project that get date from mitre website and build local database with tactics and techniques

## Setup
- clone repository
- create database on your local environment
```
cd <repository folder>
cp .env.example .env
// add to env file database name, user, pswd and change APP_ENV to production
composer install --optimize-autoloader --no-dev
php artisan key:generate
npm i
npm run prod
php artisan migrate
php artisan tactics:update
```
api docs on ```/docs```
