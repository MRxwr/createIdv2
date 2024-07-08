<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "List" ){
        $token = checkAuth();
        if( empty($token) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            if( $user = selectDBNew("users",[$token],"`keepMeAlive` LIKE ?","") ){
                if( $profiles = selectDB("profiles","`userId` = '{$user[0]["id"]}' AND `status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC")){
                    
                }else{
                    $profiles = [];
                }
                echo outputData($profiles);die();
            }else{
                echo outputError(array("msg" => "Token Not Found"));die();
            }
        }
    }
}else{
    echo outputError(array("msg" => "Action Not Set"));die();
}
?>