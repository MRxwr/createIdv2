<?php
if( isset($_COOKIE["CID"]) && !empty($_COOKIE["CID"]) && $_COOKIE["CID"] == $_POST["CSCRT"] ){
    $profile = selectDBNew("profiles",[$_POST["profileId"]],"`id` = ?","");
    $url = ( isset($profiles[0]["link"]) && !empty($profiles[0]["link"]) ) ? $profiles[0]["link"] : "{$socialMedia[0]["link"]}{$profiles[0]["account"]}" ;
    $link = str_replace(" ","",$url);
    if ( $click = selectDBNew("clicks",[$_POST["profileId"],$_POST["CSCRT"]],"`profileId` = ? AND `secret` = ?","") ){
        return $link;die();
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
        if ( insertDB("clicks",$dataInsert) ){
            return $link;die();
        }
    }
}else{
    return $link;die();
}
?>