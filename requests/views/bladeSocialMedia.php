<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "List" ){
        if ( isset(getallheaders()["createidheader"]) ){
            $headerAPI =  getallheaders()["createidheader"];
        }else{
            $error = array("msg"=>"Please set headres");
            echo outputError($error);die();
        }
        if ( $headerAPI != "createIdCreate" ){
            $error = array("msg"=>"headers value is wrong");
            echo outputError($error);die();
        }
        if( $socialMedia = selectDBNew("socialMedia",[0],"`status` LIKE ? ORDER BY title ASC","") ){
            $unsetList = ["status","date","hidden","rank"];
            foreach ($unsetList as $key => $value) {
                unset($socialMedia[0][$value]);
            }
            echo outputData($socialMedia);die();
        }
    }
}else{
    echo outputError(array("msg" => "Action Not Set"));die();
}
?>