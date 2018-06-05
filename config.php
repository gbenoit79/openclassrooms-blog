<?php
$config = [
    'database' => [
        'dsn' => 'mysql:host=localhost;dbname=blog;charset=utf8',
        'username' => 'root',
        'passwd' => 'root',
    ],
    'default' => [
        'controller' => 'post',
        'action' => 'list',
    ],
    'title' => 'Blog de Jean Forteroche',
];