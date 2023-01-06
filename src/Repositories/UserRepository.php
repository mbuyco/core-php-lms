<?php

require_once(__DIR__ . '/BaseRepository.php');

class UserRepository extends BaseRepository
{
    protected string $table_name = 'users';
}
