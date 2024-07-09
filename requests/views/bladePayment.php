<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "Submit" ){
        $token = checkAuth();
        if( empty($token) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            $user = selectDBNew("users",[$token],"`keepMeAlive` LIKE ?","");
        }
        
        if( isset($_POST["package"]) && !empty($_POST["package"]) ){
            $package = selectDBNew("package",[$_POST["package"]],"`id` = ?","");
            $price = ( $package[0]["discountType"] == 2 ? $package[0]["price"] - ($package[0]["price"] * $package[0]["discount"] / 100) : $package[0]["price"] - $package[0]["discount"]);
        }else{
            echo outputError(array("msg" => "Package Not Set"));die();
        }
        $data = array(
            "orderId" => getOrderId(),
            "price" => $price,
            "title" => $package[0]["enTitle"],
            "description" => $package[0]["enTitle"],
            "userId" => $user[0]["id"],
            "name" => $user[0]["fullName"],
            "email" => $user[0]["email"],
            "mobile" => $user[0]["phone"],
            "returnURL" => "{$settingsWebsite}/requests/index.php?a=Payment&action=Success",
            "cancelURL" => "{$settingsWebsite}/requests/index.php?a=Payment&action=Fail",
        );
        $insertData = array(
            "gatewayId" => $data["orderId"],
            "userId" => $data["userId"],
            "packageId" => $package[0]["id"],
            "period" => $package[0]["period"],
            "price" => $package[0]["price"],
            "discount" => $package[0]["discount"],
            "discountType" => $package[0]["discountType"],
            "gatewayPayload" => json_encode($data)
        );
        if( $pay = submitUpayment($data) ){
            $insertData["link"] = $pay["data"]["data"]["link"];
            /*
            if( insertDB("orders",$insertData) ){
                echo outputData($pay);die();
            }else{
                echo outputError(array("msg" => "Order Not Inserted"));die();
            }
                */
                echo outputData($pay);die();
        }else{
            echo outputError(array("msg" => "Payment Not Submitted"));die();
        }
    }elseif( $_GET["action"] == "Success" ){
        $orderId = isset($_GET["orderId"]) && !empty($_GET["orderId"]) ? $_GET["orderId"] : "";
        $order = selectDB("orders","`gatewayId` = '{$orderId}'");
        if( $order[0]["status"] == 0 ){
            $updateData = array(
                "status" => 1,
                "gatewayResponse" => json_encode($_GET),
            );
            updateDB("orders",$updateData,"`gatewayId` = '{$orderId}'");
            echo outputData($order);die();
        }else{
            echo outputError(array("msg" => "Order Already Completed"));die();
        }
    }elseif( $_GET["action"] == "Fail" ){
        $orderId = isset($_GET["orderId"]) && !empty($_GET["orderId"]) ? $_GET["orderId"] : "";
        $order = selectDB("orders","`gatewayId` = '{$orderId}'");
        if( $order[0]["status"] == 0 ){
            $updateData = array(
                "status" => 2,
                "gatewayResponse" => json_encode($_GET),
            );
            updateDB("orders",$updateData,"`gatewayId` = '{$orderId}'");
            echo outputError(array("msg" => "Payment Failed"));die();
        }else{
            echo outputError(array("msg" => "Order Already Completed"));die();
        }
    }elseif( $_GET["action"] == "List" ){
        $token = checkAuth();
        if( empty($token) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            if( $user = selectDBNew("users",[$token],"`keepMeAlive` LIKE ?","") ){
                if( $orders = selectDB("orders","`userId` = '{$user[0]["id"]}' ORDER BY `id` DESC")){
                    $unsetList = ["hidden"];
                    foreach ($orders as $key => $value) {
                        unset($orders[$key]["userId"]);
                    }
                    echo outputData($orders);die();
                }else{
                    echo outputError(array("msg" => "Orders Not Found"));die();
                }
            }else{
                echo outputError(array("msg" => "Token Not Found"));die();
            }
        }
    }
}else{
    echo outputError(array("msg" => "Action Not Set"));die();
}
?>