<?php

/**
 * This file contains all the environment variables for this application
 */

// Database configuration
define('DB_NAME', 'core_lms');
define('DB_HOST', 'postgres');
define('DB_USER', 'core_lms_user');
define('DB_PASSWORD', 'c0r3lm$');
define('DEFAULT_PAGE_TITLE', 'Simple LMS');

// User constants
define('USER_TYPE_ADMIN', 1);
define('USER_TYPE_TEACHER', 2);
define('USER_TYPE_STUDENT', 3);

// Repository configuration
define('DEFAULT_LIST_LIMIT', 10);
