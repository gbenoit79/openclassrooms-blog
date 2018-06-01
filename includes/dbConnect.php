<?php
// Connect to database
try
{
	$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Error : '.$e->getMessage());
}