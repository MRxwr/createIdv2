<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "Login" ){
        if( !isset($_POST["email"]) || empty($_POST["email"]) ){
            echo outputError(array("msg" => "Email Required"));die();
        }else{
            if( $user = selectDBNew("users",[$_POST["email"]],"`email` LIKE ?","") ){
            }else{
                echo outputError(array("msg" => "Email Not Found"));die();
            }
        }
        if( !isset($_POST["password"]) || empty($_POST["password"]) ){
            echo outputError(array("msg" => "Password Required"));die();
        }
        if( $user = selectDBNew("users",[$_POST["email"],sha1($_POST["password"])],"`email` LIKE ? AND `password` LIKE ?","") ){
            if( $user[0]["hidden"] == 2 ){
                echo outputError(array("msg" => "Account Suspended, Please Contact Administrator"));die();
            }
            if( $user[0]["status"] == 1 ){
                echo outputError(array("msg" => "Email Not Found"));die();
            }
            echo outputData($user[0]);die();
        }else{
            echo outputError(array("msg" => "Wrong Password"));die();
        }
    }else{
        echo outputError(array("msg" => "Action Not Found"));die();
    }
}else{

}
?>