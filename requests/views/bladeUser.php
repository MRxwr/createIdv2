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
            $token = password_hash(generateRandomString(), PASSWORD_BCRYPT);
            updateDB("users",array("keepMeAlive"=>$token),"`id` = '{$user[0]["id"]}'","");
            echo outputData(array("token" => $token));die();
        }else{
            echo outputError(array("msg" => "Wrong Password"));die();
        }
    }elseif( $_GET["action"] == "Forget" ){
        if( !isset($_POST["email"]) || empty($_POST["email"]) ){
            echo outputError(array("msg" => "Email Required"));die();
        }else{
            if( $user = selectDBNew("users",[$_POST["email"]],"`email` LIKE ?","") ){
                $newPass = generateRandomString();
                updateDB("users",array("password"=>sha1($newPass)),"`id` = '{$user[0]["id"]}'","");
                $data = array(
                    "email" => $user[0]["email"],
                    "password" => $newPass
                );
                forgetPass($data);
                echo outputData(array("msg" => "Password Sent To Your Email"));die();
            }else{
                echo outputError(array("msg" => "Email Not Found"));die();
            }
        }
    }elseif( $_GET["action"] == "Profile" ){
        if( !isset($_POST["token"]) || empty($_POST["token"]) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            if( $user = selectDBNew("users",[$_POST["token"]],"`keepMeAlive` LIKE ?","") ){
                $unsetList = ["password","date","keepMeAlive","status","hidden"];
                foreach ($unsetList as $key => $value) {
                    unset($user[0][$value]);
                }
                echo outputData($user[0]);die();
            }else{
                echo outputError(array("msg" => "Token Not Found"));die();
            }
        }
    }elseif( $_GET["action"] == "Token" ){
        
    }else{
        echo outputError(array("msg" => "Action Not Found"));die();
    }
}else{
    echo outputError(array("msg" => "Action Not Set"));die();
}
?>