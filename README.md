Create crud with basic security features
## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` 

## Configure Database
Rename env to .env
update database credentials

## Create user_crud Database and users table
`CREATE DATABASE user_crud;`
`CREATE TABLE users (`
  `id INT AUTO_INCREMENT PRIMARY KEY,`
  `name VARCHAR(100) NOT NULL,`
  `email VARCHAR(100) NOT NULL,`
  `mobile VARCHAR(20) NOT NULL,`
  `gender ENUM('Male', 'Female', 'Other') NOT NULL,`
  `state VARCHAR(100) NOT NULL,`
  `created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP`
  `deleted_at TIMESTAMP NULL DEFAULT NULL`
`);`

## Create Model app/Models/UserModel.php

## Create Controller app/http/User.php

## Create Views 
List View - app/Views/users/list.php
Create Form -app/Views/users/create.php
Edit Form - app/Views/users/edit.php

## Add Routes 
index,create,store,edit,update,delete

## Run the app
Start Server
php spark serve

## CSRF Protection
Enabled by default in app/Config/Filters.php and included in form using <?= csrf_field() ?>.

## XSS Protection
All outputs escaped using esc() helper.

## Form Validation
Done before insert/update via CodeIgniter’s Validation class.

## SQL Injection Prevention
Using CodeIgniter Model methods (save, update, delete) ensures query binding automatically.