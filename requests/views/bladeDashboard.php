<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "List" ){
        $token = checkAuth();
        if( empty($token) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            if( $user = selectDBNew("users",[$token],"`keepMeAlive` LIKE ?","") ){
                if( $profiles = selectDB2("`id`, `smId`","profiles","`userId` = '{$user[0]["id"]}' AND `status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC")){
                    for( $i = 0; $i < sizeof($profiles); $i++ ){
                        $socialMedia = selectDB("socialMedia","`id` = '{$profiles[$i]["smId"]}'");
                        $profiles[$i]["socialMedia"] = $socialMedia[0];
                        // Get clicks per day
                        if( $clicksPerDay = selectDB("clicks", "DATE(`date`) = CURDATE() AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerDayCount = count($clicksPerDay);
                            $profiles[$i]["clicksPerDay"] = $clicksPerDayCount;
                        }else{
                            $profiles[$i]["clicksPerDay"] = 0;
                        }

                        // Get clicks per week
                        if( $clicksPerWeek = selectDB("clicks", "WEEK(`date`) = WEEK(CURDATE()) AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerWeekCount = count($clicksPerWeek);
                            $profiles[$i]["clicksPerWeek"] = $clicksPerWeekCount;
                        }else{
                            $profiles[$i]["clicksPerWeek"] = 0;
                        }

                        // Get clicks per month
                        if( $clicksPerMonth = selectDB("clicks", "MONTH(`date`) = MONTH(CURDATE()) AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerMonthCount = count($clicksPerMonth);
                            $profiles[$i]["clicksPerMonth"] = $clicksPerMonthCount;
                        }else{
                            $profiles[$i]["clicksPerMonth"] = 0;
                        }

                        // Get clicks per year
                        if( $clicksPerYear = selectDB("clicks", "YEAR(`date`) = YEAR(CURDATE()) AND `profileId` = '{$profiles[$i]["id"]}' AND `userId` = '{$user[0]["id"]}'") ){
                            $clicksPerYearCount = count($clicksPerYear);
                            $profiles[$i]["clicksPerYear"] = $clicksPerYearCount;
                        }else{
                            $profiles[$i]["clicksPerYear"] = 0;
                        }
                    }
                    if( $clicksPerDay = selectDB("clicks", "DATE(`date`) = CURDATE() AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerDayCount = count($clicksPerDay);
                        $profiles[$i]["viewsPerDay"] = $clicksPerDayCount;
                    }else{
                        $profiles[$i]["viewsPerDay"] = 0;
                    }

                    // Get clicks per week
                    if( $clicksPerWeek = selectDB("clicks", "WEEK(`date`) = WEEK(CURDATE()) AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerWeekCount = count($clicksPerWeek);
                        $profiles[$i]["viewsPerWeek"] = $clicksPerWeekCount;
                    }else{
                        $profiles[$i]["viewsPerWeek"] = 0;
                    }

                    // Get clicks per month
                    if( $clicksPerMonth = selectDB("clicks", "MONTH(`date`) = MONTH(CURDATE()) AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerMonthCount = count($clicksPerMonth);
                        $profiles[$i]["viewsPerMonth"] = $clicksPerMonthCount;
                    }else{
                        $profiles[$i]["viewsPerMonth"] = 0;
                    }

                    // Get clicks per year
                    if( $clicksPerYear = selectDB("clicks", "YEAR(`date`) = YEAR(CURDATE()) AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerYearCount = count($clicksPerYear);
                        $profiles[$i]["viewsPerYear"] = $clicksPerYearCount;
                    }else{
                        $profiles[$i]["viewsPerYear"] = 0;
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