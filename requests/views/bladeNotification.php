<?php 
$users = transformArray(selectDB2('firebaseToken','users', "`language` = 0 AND `hidden` = '1' AND `status` = '0'"));
echo outputData($users);die();
?>