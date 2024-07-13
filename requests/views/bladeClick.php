<?php
if( isset($_COOKIE["CID"]) && !empty($_COOKIE["CID"]) && $_COOKIE["CID"] == $_POST["CSCRT"] ){
    if ( $click = selectDBNew("clicks",[$_POST["profileId"],$_POST["CSCRT"]],"`profileId` = ? AND `secret` = ?","") ){
        var_dump($click);die();
        return 1;die();
    }else{
        $account = selectDBNew("users",[$_POST["account"]],"`url` LIKE ?","");
        $dataInsert = array(
            "profileId" => $_POST["profileId"],
            "userId" => $account[0]["id"],
            "referer" => $_POST["referrer"],
            "remoteAddress" => $_SERVER["REMOTE_ADDR"],
            "userAgent" => $_SERVER["HTTP_USER_AGENT"],
            "secret" => $_POST["CSCRT"]
        );
        var_dump($dataInsert);die();
        if ( insertDB("clicks",$dataInsert) ){
            return 1;die();
        }
    }
}else{
    return 1;die();
}
?>