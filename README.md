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

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git

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
51
​
52
    git clone https://github.com/ronewxp/doctor_appointment.git
53
    composer install
54
    npm install
55
    cp .env.example .env
56
    php artisan key:generate
57
    
58
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)
59
​
60
    php artisan migrate --seed
61
    php artisan serve
