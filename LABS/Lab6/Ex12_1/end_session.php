<?php
// End the session completely
session_start();
$_SESSION = array();           
session_destroy();             
$expire = strtotime('-1 year');
setcookie(session_name(), '', $expire, '/');

// Redirect to Add Item page
header("Location: .?action=show_add_item");
exit();
?>
