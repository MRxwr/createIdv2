<?php 
$users = selectDB2('firebaseToken','users', "`langauge` = 0 AND `hidden` = '1' AND `status` = '0'");
echo outputData($users);die();
?>