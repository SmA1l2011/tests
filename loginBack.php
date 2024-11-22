<?php 

    if ($_POST) {
        $stream = fopen("csv/users.csv", "r");
        $usersData = [];
        while ($row = fgetcsv($stream)) {
            $usersData[] = $row;
        }
        
        fclose($stream);

        foreach ($usersData as $user) {
            if (password_verify($_POST["password"], $user[2]) && $user[1] == $_POST["email"]) {
                $_SESSION["user"]["userName"] = $user[0];
                $_SESSION["user"]["email"] = $user[1];
                header("location: profile.php");
            }
        }
        echo "<p>пошта або пароль введено не коректно</p>";
    }

?>