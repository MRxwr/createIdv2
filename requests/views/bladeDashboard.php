<?php
if( isset($_GET["action"]) && !empty($_GET["action"]) ){
    if( $_GET["action"] == "List" ){
        $token = checkAuth();
        if( empty($token) ){
            echo outputError(array("msg" => "Token Required"));die();
        }else{
            if( $user = selectDB2("`logo`, `fullName`","users","`keepMeAlive` LIKE '{$token}'") ){
                if( $profiles = selectDB2("`id`, `smId`","profiles","`userId` = '{$user[0]["id"]}' AND `status` = '0' AND `hidden` = '1' ORDER BY `rank` ASC")){
                    for( $i = 0; $i < sizeof($profiles); $i++ ){
                        $socialMedia = selectDB2("`title`, `icon`","socialMedia","`id` = '{$profiles[$i]["smId"]}'");
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
                        $profiles["viewsPerDay"] = $clicksPerDayCount;
                    }else{
                        $profiles["viewsPerDay"] = 0;
                    }

                    // Get clicks per week
                    if( $clicksPerWeek = selectDB("clicks", "WEEK(`date`) = WEEK(CURDATE()) AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerWeekCount = count($clicksPerWeek);
                        $profiles["viewsPerWeek"] = $clicksPerWeekCount;
                    }else{
                        $profiles["viewsPerWeek"] = 0;
                    }

                    // Get clicks per month
                    if( $clicksPerMonth = selectDB("clicks", "MONTH(`date`) = MONTH(CURDATE()) AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerMonthCount = count($clicksPerMonth);
                        $profiles["viewsPerMonth"] = $clicksPerMonthCount;
                    }else{
                        $profiles["viewsPerMonth"] = 0;
                    }

                    // Get clicks per year
                    if( $clicksPerYear = selectDB("clicks", "YEAR(`date`) = YEAR(CURDATE()) AND `profileId` = '0' AND `userId` = '{$user[0]["id"]}'") ){
                        $clicksPerYearCount = count($clicksPerYear);
                        $profiles["viewsPerYear"] = $clicksPerYearCount;
                    }else{
                        $profiles["viewsPerYear"] = 0;
                    }
                    $profiles["user"] = $user[0];
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