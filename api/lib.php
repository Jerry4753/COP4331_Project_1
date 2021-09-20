<?php

function ex($msg)
{
    http_response_code(200);
    exit(json_encode(['code' => 200, 'msg' => $msg]));
}
function err($msg)
{
    http_response_code(400);
    exit(json_encode(['code' => 400, 'msg' => $msg]));
}
function post_read(...$fields)
{
    $post_arr = json_decode(file_get_contents('php://input'), true);

    foreach ($fields as $field)
    {
        if ($post_arr[$field] == '')
        {
            err('Invalid POST Request');
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
