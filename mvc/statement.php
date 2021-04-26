<?php

require_once ('classes/Users.php');
use classes\Users;


$users = new Users();
$users->getUsers();