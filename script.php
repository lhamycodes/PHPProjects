<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "lhamycodesdb";
    $tblName = "login";
    $connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);    

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
        ]
    );

    for($i = 0; $i < count($userArray); $i++){
        $handle = $userArray[$i]['gitHandle'];
        $username = $userArray[$i]['username'];
        $password = $userArray[$i]['password'];

        $query = mysqli_query($connect, "INSERT INTO `$tblName` VALUES (NULL, '$handle', '$username', '$password')");

        echo ($query)?"Successful<br>":"Failed<br>";
    }
?>