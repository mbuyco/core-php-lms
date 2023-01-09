<?php

namespace CorePhpLms\Repositories;

class UserRepository
{
    protected ISQLRepository $sql;
    protected string $table_name = 'users';

    public function __construct(ISQLRepository $sql)
    {
        $this->sql = $sql;
    }
}
