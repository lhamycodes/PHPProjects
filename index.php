<?php
    session_start();
    $success = null;
    $failed = null;
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "lhamycodesdb";
    $tblName = "login";
    $connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LhamyCodes - Login Template</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page-wrapper flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4">
                        <form target="" method="POST" autocomplete="on">
                            <div class="card-header text-center h4 font-weight-light">
                                @LhamyCodes<br>
                                Login Template
                            </div>
                            <?php
                                if(isset($_POST['usernameParam'])){
                                    extract($_POST);
                                    $passwordParam = md5($passwordParam);
                                    $query = mysqli_query($connect, "SELECT * FROM `$tblName` WHERE `username` = '$usernameParam' AND `password` = '$passwordParam'");
                                    if(mysqli_num_rows($query) < 1){
                                        $failed = "Username / Password Mismatch..";
                                    }
                                    else
                                    {
                                        while($row = mysqli_fetch_row($query)){
                                            $userFullName = $row[1];
                                        }
                                        $success = "Login Successful, Welcome $userFullName";
                                    }
                                }
                                if(isset($success) || (isset($failed))){
                                    if($success){
                                        $type = "primary";
                                        $message = $success;
                                    }
                                    else if ($failed)
                                    {
                                        $type = "danger";
                                        $message = $failed;
                                    }
                                    $output =  "<div class='alert alert-dismissible alert-$type'>
                                                    $message
                                                </div>";

                                    echo $output;
                                }
                            ?>

                            <div class="card-body py-3">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input type="text" name="usernameParam" required class="form-control" placeholder="Username Here">
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" name="passwordParam" required class="form-control" placeholder="Password Here">
                                </div>

                            </div>

                            <div class="card-footer" id="dd">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-5">Login</button>
                                    </div>

                                    <div class="col-6 text-right">
                                        <a href="#" class="btn hlink btn-link">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                            
                        </form>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>