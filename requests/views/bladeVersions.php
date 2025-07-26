<?php 
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "update" ){
        if( !isset($_POST["ios"]) || empty($_POST["ios"]) ){
            $error["msg"] = "Please enter ios version number";
            echo outputError($error);die();
        }
        if( !isset($_POST["android"]) || empty($_POST["android"]) ){
            $error["msg"] = "Please enter android version number";
            echo outputError($error);die();
        }
        $dataUpdate = array(
            "ios" => $_POST["ios"],
            "android" => $_POST["android"]
        );
        if( updateDB("versions",$dataUpdate,"`id` = '1'") ){
            $versions = selectDB2("`ios`,`android`","versions","`id` = '1'" );
            $response["versions"] = $versions[0];
            echo outputData($response);
        }
    }elseif( $_GET["action"] == "list" ){
        if( $versions = selectDB2("`ios`,`android`","versions","`id` = '1'" ) ){
            $response["versions"] = $versions[0];
            echo outputData($response);
        }
    }else{
        $error["msg"] = "Error while loading settings info";
        echo outputError($error);die();
    }
}else{
    $error["msg"] = "Please enter a correct action";
    echo outputError($error);die();
}

?>