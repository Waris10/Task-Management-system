
# Task Management System

## Description

A simple Laravel web application for task management

## Features

-   CRUD and reorder tasks with drag and drop functionality.
-   Tasks and projects are related, so you can filter your task list
-   Priorities are given automatically/assigned to newly added tasks
-   Automatic priority update based on reorder.

## Screenshot

![task management](https://github.com/user-attachments/assets/680cf25a-a004-45ac-8879-6b13dfb68ef7)

### Prerequisites

-   PHP 8.2 or higher
-   Laravel 11.x
-   Livewire v3
-   Composer
-   MySQL
-   npm

### Installation and Setup

1. Clone the repository:

-   git clone <repository-url>
-   cd taskManagementSystem

2. Install Dependencies:

-   composer install
-   npm install

3. Configure your .env file and update your database credentials

4. Migrate the Database and seed the ProjectSeeder

-   php artisan migrate --seed

5. Access the website/webApp through you development server

-   php artisan serve
-   [development server](http://127.0.0.1:8000)
