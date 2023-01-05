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
├── docker
│   └── nginx
│       └── default.conf
├── docker-compose.yaml
├── Dockerfile
├── lib
│   ├── core
│   │   ├── config.php
│   │   ├── constants.php
│   │   └── session.php
│   ├── lessons.php
│   ├── login.php
│   ├── progress_tracking.php
│   ├── registration.php
│   ├── repositories
│   │   └── IRepository.php
│   └── services
│       ├── AbstractDBDriver.php
│       ├── IDBDriver.php
│       └── PostgresDriver.php
├── LICENSE
├── logout.php
├── public
│   └── index.php
├── README.md
├── scripts
│   └── clean.php
└── tests
```

- **CHANGELOG.md** - Contains all notable code changes
- **dashboard.php** - Dashboard page for authenticated users
- **docker/** - Files related to docker
- **docker/nginx/** - Files related to docker nginx configuration
- **docker-compose.yaml** - Docker compose configuration
- **Dockerfile** - Dockerfile configuration
- **lib/core/config.php** - Contains application-wide configuration
- **lib/core/constants.php** - Contains application-wide constants
- **lib/core/session.php** - Contains class related to session management
- **lib/lessons.php** - A collection of functions for handling lession logic
- **lib/login.php** - A collection of functions for handling login logic
- **lib/progress_tracking.php** - A collection of functions for handling lesson progress tracking
- **lib/registration.php** - A collection of functions for handling registration logic
- **lib/repositories/** - Contains repository classes used for interacting with database
- **lib/services/** - Contains service classes which acts as a wrapper to external libraries / API clients
- **logout.php** - Page for handling logout
- **public/** - Folder which contains files that are publicly accessible
- **public/index.php** - Main page
- **README.md** - Readme documentation
- **scripts/** - Scripts for infrastructure management
- **tests/** - Contains unit tests

## Running locally

```
cd php-lms
php -S localhost:3000
```

Then visit http://localhost:3000
