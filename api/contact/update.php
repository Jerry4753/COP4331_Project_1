<?php
require('../lib.php');

$post_arr = post_read('PSK', 'CID', 'first_name', 'last_name', 'phone_number');
$db_con = db_con('contacts');

if ($db_con->query("SELECT CID FROM contact_dump WHERE PSK='$post_arr[PSK]' CID=$post_arr[ID]")->fetch_assoc())
{
    $db_con->query("UPDATE contact_dump SET first_name='$post_arr[first_name]', last_name='$post_arr[last_name]', phone_number='$post_arr[phone_number]' WHERE ID='$post_arr[ID]'");
    ex("CID '$post_arr[CID]' Updated");
}
else
{
    err("CID '$post_arr[CID]' For PSK '$post_arr[PSK]' Does Not Exist");
}
