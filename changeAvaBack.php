<?php

    $usersData = readCsv("csv/users.csv", "r");
    if (isset($_POST["light"]) || !isset($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]])) {
        setTheme(1, "profile.php", (30 * 24 * 3600));
    }
    if (isset($_POST["dark"])) {
        setTheme(0, "profile.php", (30 * 24 * 3600));
    }

?>