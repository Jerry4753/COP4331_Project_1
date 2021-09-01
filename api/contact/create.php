<?php

require('../lib.php');

$post_arr = post_read('PSK', 'first_name', 'last_name', 'phone_number');
$db_con = db_con('contacts');

if ($db_con->query("INSERT into contact_dump (PSK, first_name, last_name, phone_number) VALUES('$post_arr[PSK]', '$post_arr[first_name]','$post_arr[last_name]','$post_arr[phone_number]')"))
{ 	
	ex(['CID' => $db_con->insert_id]);
}
else
{	
	err("Could Not Add Contact '$post_arr[first_name] $post_arr[last_name]'");
}
