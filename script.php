<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "lhamycodesdb";
    $tblName = "login";
    $connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);    

    // You too can add your users by adding them to this array following the format below
    $userArray = array(
        [
            'gitHandle' => "@lhamycodes",
            'username' => "dayjeerow7",
            'password' => "iamlhamide"
        ],
        [
            'gitHandle' => "@jsdev",
            'username' => "johnny",
            'password' => "itsyoungjohn"
        ],
        [
            'gitHandle' => "@blessyhope1",
            'username' => "blessing1",
            'password' => "blessy4christ"
        ],
        [
            'gitHandle' => "@ghostology",
            'username' => "hemmyprodigy",
            'password' => "hemmy4christ"
        ]
    );

    for($i = 0; $i < count($userArray); $i++){
        $handle = $userArray[$i]['gitHandle'];
        $username = $userArray[$i]['username'];
        $password = $userArray[$i]['password'];
        $password = md5($password);

        $prequery = mysqli_query($connect, "SELECT * FROM `$tblName` WHERE `git_handle` = '$handle' and `username` = '$username'");
        if(mysqli_num_rows($prequery) < 1){
            $query = mysqli_query($connect, "INSERT INTO `$tblName` VALUES (NULL, '$handle', '$username', '$password')");

            echo ($query)?"Successfully added $handle<br>":"Failed to add $handle<br>";
        }
        else
        {
            echo "a User with git Handle $handle Already exist<br>";
        }
    }
?>