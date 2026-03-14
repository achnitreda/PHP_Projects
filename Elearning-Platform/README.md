# Elearning-Platform

Simple elearning admin dashboard built with PHP, MySQL, Bootstrap, and vanilla JavaScript.

## Overview

This project is a small school/training management app where an admin can:

- sign up and sign in
- view a dashboard with summary cards
- manage students (create, read, update, delete)
- view payment records and payment details

The UI is component-based (`components/header.php`, `components/sidebar.php`, `components/navbar.php`, `components/footer.php`) and uses Bootstrap 5 + Font Awesome.

## Tech Stack

- PHP (PDO)
- MySQL
- HTML/CSS
- Bootstrap 5
- JavaScript (form validation)

## Project Structure

```text
.
|- index.php                # login page
|- signUp.php               # registration page
|- dashboard.php            # dashboard cards
|- student.php              # student list
|- payment.php              # payments list
|- logout.php               # session logout
|- db.php                   # PDO database connection
|- index.js                 # signup form validation
|- Crud/
|  |- Student/              # create/edit/delete student
|  |- Payment/view.php      # payment detail page
|  `- Course/               # currently empty (not implemented)
|- components/              # shared layout components
`- css/style.css            # custom styles
```

## Prerequisites

- PHP 7.4+ (PHP 8.x recommended)
- MySQL 5.7+/8.x or MariaDB
- Apache/Nginx local server
- phpMyAdmin (optional but useful)

## Database Setup

The app expects this connection in `db.php`:

- host: `localhost`
- db name: `e_classe_db`
- user: `root`
- password: empty (`""`)

Create the database and required tables:

```sql
CREATE DATABASE IF NOT EXISTS e_classe_db;
USE e_classe_db;

CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(150) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS students (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(150) NOT NULL,
	phone VARCHAR(30) NOT NULL,
	enroll_number VARCHAR(50) NOT NULL,
	date_of_admission VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS payments (
	id INT AUTO_INCREMENT PRIMARY KEY,
	Name VARCHAR(100) NOT NULL,
	payment VARCHAR(80) NOT NULL,
	bill VARCHAR(80) NOT NULL,
	amount DECIMAL(10,2) NOT NULL DEFAULT 0,
	balance DECIMAL(10,2) NOT NULL DEFAULT 0,
	date VARCHAR(50) NOT NULL
);
```

Optional sample payment data:

```sql
INSERT INTO payments (Name, payment, bill, amount, balance, date) VALUES
('John Doe', 'Monthly', 'BILL-001', 500.00, 100.00, '2026-03-01'),
('Sara Ali', 'Quarterly', 'BILL-002', 1200.00, 0.00, '2026-03-03');
```

## How to Run (Recommended: Apache + htdocs)

Because redirects in the code use URLs like `http://localhost/Elearning-Platform/...`, keep the folder name exactly `Elearning-Platform` under your web root.

### 1. Place project in web root

Examples:

- XAMPP: `/opt/lampp/htdocs/Elearning-Platform`
- LAMP: `/var/www/html/Elearning-Platform`

### 2. Start services

- Start Apache
- Start MySQL

### 3. Import/create database

- Run the SQL above using phpMyAdmin or MySQL CLI

### 4. Open in browser

```text
http://localhost/Elearning-Platform/index.php
```

### 5. Create first account

- Open `Sign up`
- Register a user
- Sign in with that account

## Alternative Run (PHP Built-in Server)

You can run:

```bash
php -S localhost:8000
```

from the project directory, but note:

- some redirects are hardcoded to `/Elearning-Platform/...`
- you may need to update those redirects for port `8000`

## Implemented Features

- Authentication with session login/logout
- Remember-me cookies on login form
- Signup form validation in JavaScript
- Dashboard student count and payment sum
- Student CRUD
- Payment listing and detail view

## Current Limitations

- Course module files exist but are not implemented yet
- Report/Settings links are placeholders
- No rolebased access control
- Security hardening (CSRF, stronger password flow, etc.) is not yet implemented
