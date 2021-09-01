<?php

require('../lib.php');

$post_arr = post_read('PSK', 'query');
$db_con = db_con('contacts');

$query = $db_con->query("SELECT first_name, last_name, phone_number FROM contact_dump WHERE PSK='$post_arr[PSK]' and (first_name LIKE '$post_arr[query]%' or last_name LIKE '$post_arr[query]%' or phone_number LIKE '$post_arr[query]%')");
if ($result = $query->fetch_assoc())
{ 	
	$results_arr = ['results' => [1 => $result]];
	while ($result = $query->fetch_assoc())
	{
		 $results_arr['results'][] = $result;
	}
	ex($results_arr);
}
else
{	
	err('No Results');
}
