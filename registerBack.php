<?php 
    
    session_start();
    
    // $error = "";

    if ($_POST) {
        $stream = fopen("csv/users.csv", "a+");
        $usersData = [];
        while ($row = fgetcsv($stream)) {
            $usersData[] = $row;
        }
        
        try {
            if (empty($_POST["userName"]) || strlen($_POST["userName"]) > 50 || strlen($_POST["userName"]) < 2) {
                throw new Exception("довжина імені має бути від 2 до 50 символів");
            } else {
                if (empty($_POST["email"]) || strlen($_POST["email"]) > 50 || strlen($_POST["email"]) < 12) {
                    throw new Exception("довжина пошти має бути від 12 до 50 символів");
                } else {
                    foreach ($usersData as $user) {
                        if ($_POST["email"] == $user[1]) {
                            throw new Exception("така пошта вже використовується");
                            break;
                        }
                    }
                    if (empty($_POST["password"]) || strlen($_POST["password"]) > 24) {
                        throw new Exception("пароль введений не коректно");
                    } else {
                        if (strlen($_POST["password"]) < 8 || count(explode(" ", $_POST["password"])) !== 1) {
                            throw new Exception("в паролі має бути 8 або більше символів і він має бути без пробілів");
                        } else {
                            if ($_POST["password"] !== $_POST["passwordAg"]) {     
                                throw new Exception("пароль не зівпадає з паролем");
                            } else {
                                fputcsv($stream, [$_POST["userName"], $_POST["email"], password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost" => 12])]);
                                fclose($stream);
                                header("location: login.php");
                            }
                        }
                    }
                }
            }
        } catch (Exception $err) {
            $error = $err->getMessage();
        }
    }

?>