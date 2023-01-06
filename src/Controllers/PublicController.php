<?php

namespace CorePhpLms\Controllers;

use CorePhpLms\Lib\View;

class PublicController extends BaseController
{
    public function get(array $params)
    {
        View::render('login', $params);
    }
}
