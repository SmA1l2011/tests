<?php 
    
    if ($_POST) {
        $stream = fopen("csv/users.csv", "a+");
        $usersData = [];
        while ($row = fgetcsv($stream)) {
            $usersData[] = $row;
        } 
        // echo "<pre>";
        // print_r($usersData);
        // print_r($_POST["email"]);
        // echo "</pre>";
        if (isset($_POST["userName"]) && !empty($_POST["userName"])) {
            if (isset($_POST["email"]) && !empty($_POST["email"])) {
                foreach ($usersData as $user) {
                    if ($_POST["email"] == $user[1]) {
                        echo "<p>така пошта вже використовується</p>";
                        break;
                    } else {
                        if (isset($_POST["password"]) && !empty($_POST["password"])) {
                            if (strlen($_POST["password"]) >= 8 && count(explode(" ", $_POST["password"])) == 1) {
                                if ($_POST["password"] === $_POST["passwordAg"]) {     
                                    fputcsv($stream, [$_POST["userName"], $_POST["email"], password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost" => 12])]);
                                    fclose($stream);
                                    header("location: login.php");
                                } else {
                                    echo "<p>пароль не зівпадає з паролем</p>";
                                }
                            } else {
                                echo "<p>в паролі має бути 8 або більше символів і він має бути без пробілів</p>";
                            }
                        } else {
                            echo "<p>пароль введений не коректно</p>";
                        }
                    }
                }
            } else {
                echo "<p>пошта введена не коректно</p>";
            }
        } else {
            echo "<p>ім'я користувача введене не коректно</p>";
        }
    }

?>