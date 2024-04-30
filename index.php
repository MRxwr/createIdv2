<?php
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");
if( isset($_GET["account"]) && !empty($_GET["account"]) ){
    if( $account = selectDB("users","`url` LIKE '".strtolower($_GET["account"])."' AND `hidden` = '1' AND `status` = '0'") ){ 
        $account = $account[0];
        if( $profiles = selectDB("profiles","`userId` = '{$account["id"]}' AND `status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC")){
        }else{
            $profiles = [];
        }
    }else{
        header("LOCATION: /");die();
    }
}else{
    header("LOCATION: /");die();
}
?>

<!DOCTYPE html>
<html lang="en" >

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <title>Create ID - <?php echo strtoupper($account["url"]) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/245c9398b0.js"></script>
    <?php require_once("css/style.php"); ?>
</head>

<body>
    <div class="container">
    <div class="col-xs-12">
            <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                <img class="backdrop linktree">
                <h2 style="color: #ffffff; padding-top: 20px;"><?php echo $account["details"] ?></h2>
            </div>
    </div>
    </div>


    <div class="container">
    <div class="col-xs-12">
        <div class="text-center">
            <?php
            if( count($profiles) > 0 ){
                for( $i = 0; $i < sizeof($profiles); $i++ ){
                    $shake = ( $profiles[$i]["isMoving"] == 1 ) ? "shake" : "";
                    $socialMedia = selectDB("socialMedia","`id` = '{$profiles[$i]["smId"]}'");
                    $url = ( isset($profiles[$i]["link"]) && !empty($profiles[$i]["link"]) ) ? $profiles[$i]["link"] : "{$socialMedia[0]["link"]}{$profiles[$i]["account"]}" ;
                    $link = "window.open('".str_replace(" ","",$url)."')";
                    $logo = ( isset($profiles[$i]["logo"]) && !empty($profiles[$i]["logo"])) ? "<img src='logos/{$profiles[$i]["logo"]}' style='height:25px;width:25px'>": $socialMedia[0]["icon"];
                    $text = ( isset($profiles[$i]["text"]) && !empty($profiles[$i]["text"]) ) ? $profiles[$i]["text"] : $profiles[$i]["account"] ;
                    echo "<div style='padding-bottom: 30px; display: flex; justify-content: center;'><button onclick={$link} type='button' class='{$profiles[$i]["btnColor"]} {$shake}' style='width: 80%; padding-top: 10px; padding-bottom: 10px; font-weight: 600; user-select: auto; display: flex; align-items: center;'>{$logo}<span style='flex: 1; text-align: center;white-space: break-spaces;'>{$text}</span>
                    </button>
                </div>";
                }
            }
            ?>
        </div>
    </div>
    </div>

        <div class="text-center">
            <a href="https://www.createkuwait.com/" style="color: #34312f;" target="_blank">Made with <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height:25px;width:25px"><path fill="#ff0000" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg> Create co.</a>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>