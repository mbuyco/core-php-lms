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
├── CHANGELOG.md
├── dashboard.php
├── index.php
├── lib
│   ├── lessons.php
│   ├── login.php
│   ├── progress_tracking.php
│   └── registration.php
├── LICENSE
├── README.md
└── tests
```

- **CHANGELOG.md** - Contains all notable code changes
- **dashboard.php** - Dashboard page for authenticated users
- **index.php** - Main page
- **lib/lessons.php** - A collection of functions for handling lession logic
- **lib/login.php** - A collection of functions for handling login logic
- **lib/progress_tracking.php** - A collection of functions for handling lesson progress tracking
- **lib/registration.php** - A collection of functions for handling registration logic
- **tests/** - Contains unit tests

## Running locally

```
cd php-lms
php -S localhost:3000
```

Then visit http://localhost:3000
