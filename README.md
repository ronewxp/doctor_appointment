# Getting started

​

## Installation

​

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x)

​

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

​

Clone the repository

​

    git clone https://github.com/ronewxp/doctor_appointment.git
​

Switch to the repo folder

​

    cd laravel-realworld-example-app

​

Install all the dependencies using composer

​

    composer install

​

Copy the example env file and make the required configuration changes in the .env file

​

    cp .env.example .env

​

Generate a new application key

​

    php artisan key:generate

​

​

Run the database migrations (**Set the database connection in .env before migrating**)

​

    php artisan migrate --seed

​

Start the local development server

​

    php artisan serve

​

You can now access the server at http://localhost:8000


**TL;DR command list**

​

    git clone https://github.com/ronewxp/doctor_appointment.git

    composer install

    npm install

    cp .env.example .env

    php artisan key:generate

    

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

​

    php artisan migrate --seed

    php artisan serve
