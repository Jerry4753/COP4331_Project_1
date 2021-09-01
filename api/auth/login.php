<?php

require('../lib.php');

$post_arr = post_read('username', 'password');
$auth_db_con = db_con('accounts');

if ($result = $auth_db_con->query("SELECT PSK FROM users WHERE username='$post_arr[username]' AND password='$post_arr[password]'")->fetch_assoc())
{
	ex(['PSK' => $result['PSK']]); 
}
else
{
	err("Authentication For User '$post_arr[username]' failed");
}
