<?php
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
    }
?>