<?php
require('../lib.php');

$post_arr = post_read('PSK', 'CID');
$db_con = db_con('contacts');

if ($db_con->query("SELECT CID FROM contact_dump WHERE PSK='$post_arr[PSK]' and CID=$post_arr[ID]")->fetch_assoc())
{
    $db_con->query("DELETE FROM contact_dump WHERE PSK='$post_arr[PSK]' and CID=$post_arr[ID]");
    ex("CID '$post_arr[CID]' Deleted");
}
else
{
    err("CID '$post_arr[CID]' For PSK '$post_arr[PSK]' Does Not Exist");
}
