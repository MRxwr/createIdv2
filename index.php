<?php
if( !isset($_GET["account"]) || empty($_GET["account"]) ){
    header("LOCATION: default.php");die();
}elseif( $account = selectDB("users","`url` LIKE '".strtolower($_GET["account"])."' AND `hidden` = '1' AND `status` = '0'") ){
    if( $profiles = selectDB("profiles","`userId` = '{$account[0]["id"]}'")){
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
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='http://bit.ly/2IZURI7'" type="button" class="btn btn-outline-light shake" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 800;">15% OFF Instagram Growth</button>
                </div>
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='http://bit.ly/2SVZXES'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Guide: Increasing Your Engagement</button>
                </div>
                <div style="padding-bottom: 30px; display: flex; justify-content: center;">
                    <button onclick="location.href='#'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top: 10px; padding-bottom: 10px; font-weight: 600; user-select: auto; display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="height:35px; width:35px; fill:red"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                        <span style="flex: 1; text-align: center;">View My YouTube Channel</span>
                    </button>
                </div>
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='#'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 600;">Connect On LinkedIn</button>
                </div>
                <div style="padding-bottom: 30px;">
                    <button onclick="location.href='#'" type="button" class="btn btn-outline-light" style="width: 80%; padding-top:10px; padding-bottom:10px; font-weight: 600;">My Personal Website</button>
                </div>
            </div>
    </div>
    </div>

        <div class="text-center">
            <a href="https://www.createkuwait.com/" style="color: #34312f;" target="_blank">made with (k) Create co.</a>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>