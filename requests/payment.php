<?php
var_dump($orderData = checkUpayment($_GET["track_id"]));
if( isset($_GET["track_id"]) && !empty($_GET["track_id"]) ){
    if ( $orderData = checkUpayment($_GET["track_id"]) ){
        $orderData = json_decode($orderData,true);
        $order = selectDB("orders","`gatewayId` = '{$orderData["data"]["transaction"]["reference"]}'");
        if( $order[0]["status"] == 0 ){
            if( $orderData["data"]["transaction"]["result"] == "CAPTURED" ){
                $updateData = array(
                    "status" => 1,
                    "gatewayResponse" => json_encode($orderData),
                );
                updateDB("orders",$updateData,"`gatewayId` = '{$orderId}'");
                echo outputData($order);die();
            }else{
                $updateData = array(
                    "status" => 2,
                    "gatewayResponse" => json_encode($_GET),
                );
                updateDB("orders",$updateData,"`gatewayId` = '{$orderId}'");
                echo outputError(array("msg" => "Payment Failed"));die();
            }
        }else{
            echo outputError(array("msg" => "Payment Already Completed"));die();
        }
    }else{
        echo outputError(array("msg" => "Order Not Found"));die();
    }
}else{
    echo outputError(array("msg" => "Track Id Not Set"));die();
}
?>