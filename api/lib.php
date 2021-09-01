<?php

function ex($msg)
{
	exit(json_encode(['err' => 0, 'out' => $msg]));
}
function err($msg)
{
	exit(json_encode(['err' => 1, 'out' => $msg]));
}
function post_read(...$fields)
{
	$post_arr = json_decode(file_get_contents('php://input'), true);

	foreach ($fields as $field)
	{	
		if ($post_arr[$field] == '')
		{
			err(1, 'Invalid POST Request');
		}
	}
	return $post_arr;
}
function db_con($db)
{
	$db_con = new mysqli('localhost', 'root', 'jkoXM5cSiw5i', $db);

	if ($db_con->connect_error)
	{
		err($db_con->connect_error);
	}
	return $db_con;
}
