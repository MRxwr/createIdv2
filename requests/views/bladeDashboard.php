<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "List" ){
        $token = checkAuth();
        if( empty($token) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            if( $user = selectDBNew("users",[$token],"`keepMeAlive` LIKE ?","") ){
                if( $profiles = selectDB("profiles","`userId` = '{$user[0]["id"]}' AND `status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC")){
                    for( $i = 0; $i < sizeof($profiles); $i++ ){
                        // Get clicks per day
                        if( $clicksPerDay = selectDB("clicks", "DATE(`timestamp`) = CURDATE() AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerDayCount = count($clicksPerDay);
                            $profiles[$i]["clicksPerDay"] = $clicksPerDayCount;
                        }else{
                            $profiles[$i]["clicksPerDay"] = 0;
                        }

                        // Get clicks per week
                        if( $clicksPerWeek = selectDB("clicks", "WEEK(`timestamp`) = WEEK(CURDATE()) AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerWeekCount = count($clicksPerWeek);
                            $profiles[$i]["clicksPerWeek"] = $clicksPerWeekCount;
                        }else{
                            $profiles[$i]["clicksPerWeek"] = 0;
                        }

                        // Get clicks per month
                        if( $clicksPerMonth = selectDB("clicks", "MONTH(`timestamp`) = MONTH(CURDATE()) AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerMonthCount = count($clicksPerMonth);
                            $profiles[$i]["clicksPerMonth"] = $clicksPerMonthCount;
                        }else{
                            $profiles[$i]["clicksPerMonth"] = 0;
                        }

                        // Get clicks per year
                        if( $clicksPerYear = selectDB("clicks", "YEAR(`timestamp`) = YEAR(CURDATE()) AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerYearCount = count($clicksPerYear);
                            $profiles[$i]["clicksPerYear"] = $clicksPerYearCount;
                        }else{
                            $profiles[$i]["clicksPerYear"] = 0;
                        }
                    }
                }else{
                    $profiles = [];
                }
                echo outputData($profiles);die();
            }else{
                echo outputError(array("msg" => "Token Not Found"));die();
            }
        }
    }
}else{
    echo outputError(array("msg" => "Action Not Set"));die();
}
?>