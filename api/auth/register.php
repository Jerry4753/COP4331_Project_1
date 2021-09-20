<?php

require('../lib.php');

$post_arr = post_read('username', 'password');
$auth_db_con = db_con('accounts');
$psk = uniqid('psk:', true);

if ($result = $auth_db_con->query("SELECT username FROM users WHERE username='$post_arr[username]'")->fetch_assoc())
{
    err("Username '$result[username]' Taken");
}
else if ($auth_db_con->query("INSERT into users (PSK, username, password) VALUES('$psk', '$post_arr[username]', '$post_arr[password]')"))
{
    ex("User '$post_arr[username]' Created");
}
else
{
    err("Could Not Create User '$post_arr[username]'");
}
