CRM Dashboard Project - Laravel

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p><p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>Project Overview

This project is a Customer Relationship Management (CRM) Dashboard built using Laravel 11. The CRM is designed to help businesses manage their customer relationships, track sales performance, and enhance productivity through reporting and analytics. The project was developed as part of an internship at Devsinz and is targeted for use by businesses of all sizes to streamline customer interactions and improve operational efficiency.

Key Features

1. User Authentication

Secure user registration and login.

Password reset functionality.

Role-based access control (Admin, Sales, Support).


2. Profile Management

Users can update their profile information and password.


3. Customer Management

Full CRUD operations for managing customer data.

Customer interaction tracking with reminders and notifications.


4. Deals and Pipelines

Track customer deals with a dedicated deals table.

Manage pipelines and view deal stages.


5. Reminder Notifications

Reminders for customer interactions.

Implemented using Laravel's queue system and Windows 11 Task Scheduler to ensure timely notifications.


6. Reporting and Analytics

Customizable dashboards with key business metrics.

Reports on customer interactions, sales performance, and team productivity.

Export functionality for data reports.


Project Structure

Database Schema

Users Table: Stores user information along with their roles.

Customers Table: Manages customer details and interactions.

Deals Table: Tracks deals with fields like deal_value.

Pipelines Table: Handles the pipeline stages for each deal.

Notifications Table: Manages notifications with UUID for unique IDs.


Technologies

Laravel 11: Backend framework.

MySQL: Database for managing user, customer, and deal data.

Apache & MySQL on Windows 11: Web server setup for development.

Bootstrap: Frontend framework for responsive UI.


Installation Instructions

To set up this project on your local machine:

Prerequisites

PHP 8.x or later

Composer

MySQL

Apache or Nginx


Steps

1. Clone the repository:

git clone https://github.com/shahrukhahmed125/CRM-Laravel-11.git


2. Install dependencies:

composer install


3. Set up the environment:

Duplicate the .env.example file and rename it to .env.

Update the .env file with your database credentials.



4. Generate application key:

php artisan key:generate


5. Run migrations:

php artisan migrate


6. Seed the database (optional):

php artisan db:seed


7. Run the application:

php artisan serve



You can now access the application at http://localhost:8000.


Thank you for checking out the CRM Dashboard project!

