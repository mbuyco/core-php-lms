<?php

require_once(__DIR__ . '/constants.php');
require_once(__DIR__ . '/session.php');

function get_page_title()
{
    $session_manager = new SessionManager();
    $title = $session_manager->get('title')
        ? $session_manager->get('title') . ' | ' . DEFAULT_PAGE_TITLE
        : DEFAULT_PAGE_TITLE;
    return $title;
}

return [
    'title' => get_page_title(),
];
