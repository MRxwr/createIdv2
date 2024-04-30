<?php
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");
if( !isset($_GET["account"]) || empty($_GET["account"]) ){
    header("LOCATION: default.php");die();
}elseif( $account = selectDB("users","`url` LIKE '".strtolower($_GET["account"])."' AND `hidden` = '1' AND `status` = '0'") ){
    $account = $account[0];
    if( $profiles = selectDB("profiles","`userId` = '{$account[0]["id"]}' ORDER BY `rank` ASC")){
    }else{
        $profiles = [];
    }
}else{
    header("LOCATION: default.php");die();
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
                    $link = "location.href='{$socialMedia[0]["link"]}{$profiles[$i]["account"]}'";
                    $svg = $socialMedia[0]["icon"];
                    echo "<div style='padding-bottom: 30px; display: flex; justify-content: center;'><button onclick='{$link}' type='button' class='btn btn-outline-light {$shake}' style='width: 80%; padding-top: 10px; padding-bottom: 10px; font-weight: 600; user-select: auto; display: flex; align-items: center;'>{$svg}<span style='flex: 1; text-align: center;'>{$profiles[$i]["account"]}</span>
                    </button>
                </div>";
                }
            }
            ?>
        </div>
    </div>
    </div>

        <div class="text-center">
            <a href="https://www.createkuwait.com/" style="color: #34312f;" target="_blank">Made with (k) Create co.</a>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>