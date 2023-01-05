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
├── data
│   ├── lms.db
│   └── schema.sql
├── index.php
├── lib
│   ├── config.php
│   ├── constants.php
│   ├── lessons.php
│   ├── login.php
│   ├── progress_tracking.php
│   ├── registration.php
│   ├── repositories
│   │   ├── IRepository.php
│   │   └── UserRepository.php
│   ├── services
│   │   └── SQLite3Driver.php
│   └── session.php
├── LICENSE
├── logout.php
├── README.md
├── scripts
│   ├── clean.php
│   └── migrate.php
└── tests
```

- **CHANGELOG.md** - Contains all notable code changes
- **dashboard.php** - Dashboard page for authenticated users
- **data/** - Contains SQLite data
- **index.php** - Main page
- **lib/config.php** - Contains application-wide configuration
- **lib/constants.php** - Contains application-wide constants
- **lib/lessons.php** - A collection of functions for handling lession logic
- **lib/login.php** - A collection of functions for handling login logic
- **lib/progress_tracking.php** - A collection of functions for handling lesson progress tracking
- **lib/registration.php** - A collection of functions for handling registration logic
- **lib/repositories/** - Contains repository classes used for interacting with database
- **lib/services/** - Contains service classes which acts as a wrapper to external libraries / API clients
- **lib/session.php** - Contains class related to session management
- **logout.php** - Page for handling logout
- **tests/** - Contains unit tests

## Running locally

```
cd php-lms
php -S localhost:3000
```

Then visit http://localhost:3000
