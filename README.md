# Core PHP LMS

A simple learning management system using core PHP, HTML, CSS and JS.

## Initial features

- Login / register as a Teacher or Student
- Teacher can create, edit or delete lessons
- Student can view lessons created by teachers
- Simple progress tracking (viewing content)

## Requirements

- PHP 7+

## Project structure

```
.
├── dashboard.php
├── index.php
├── lib
│   └── registration.php
└── tests
```

**dashboard.php** - Dashboard page for authenticated users
**index.php** - Main page
**lib/registration.php** - A collection of functions for handling registration logic
**tests/** - Contains unit tests

## Running locally

```
cd php-lms
php -S localhost:3000
```

Then visit http://localhost:3000
