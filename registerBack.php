<?php

    if ($_POST) {
        $usersData = readCsv("csv/users.csv", "r");
        try {
            if (strlen($_POST["userName"]) > 50 || strlen($_POST["userName"]) < 2) {
                throw new Exception("довжина імені має бути від 2 до 50 символів");
            } else {
                if (strlen($_POST["email"]) > 50 || strlen($_POST["email"]) < 12) {
                    throw new Exception("довжина пошти має бути від 12 до 50 символів");
                } else {
                    foreach ($usersData as $user) {
                        if ($_POST["email"] == $user[1]) {
                            throw new Exception("така пошта вже використовується");
                            break;
                        }
                    }
                    if (!preg_match('#^[a-zA-Z][a-zA-Z0-9\.\_\-]+[a-zA-Z0-9]\@[a-zA-Z\_\-]+(\.[a-zA-Z]{2,3}){1,2}$#', $_POST["email"])) {
                        throw new Exception("пошта введена не коректно");
                    } else {
                        if (strlen($_POST["phone"]) > 20 || strlen($_POST["phone"]) < 8) {
                            throw new Exception("довжина номеру має бути від 8 до 20 символів");
                        } else {
                            foreach ($usersData as $user) {
                                if ($_POST["phone"] == $user[2]) {
                                    throw new Exception("такий номер вже використовується");
                                    break;
                                }
                            }
                            if (!preg_match('#^\+\d{1,4} ?\(?\d{1,3}\)? ?\d{3}[ \-]?\d{2}[ \-]?\d{2}$#', $_POST["phone"])) {
                                throw new Exception("номер телефону введений не коректно");
                            } else {
                                if (empty($_POST["password"]) || strlen($_POST["password"]) > 24) {
                                    throw new Exception("пароль введений не коректно");
                                } else {
                                    if (strlen($_POST["password"]) < 8 || count(explode(" ", $_POST["password"])) !== 1) {
                                        throw new Exception("в паролі має бути 8 або більше символів і він має бути без пробілів");
                                    } else {
                                        if ($_POST["password"] !== $_POST["passwordAg"]) {     
                                            throw new Exception("пароль не зівпадає з паролем");
                                        } else {
                                            $phone = $_POST["phone"];
                                            $phone = str_replace(" ", "", $phone);
                                            $phone = str_replace("-", "", $phone);
                                            $phone = str_replace("(", "", $phone);
                                            $phone = str_replace(")", "", $phone);
                                            putToCsv("csv/users.csv", "a+", [$_POST["userName"], $_POST["email"], $phone, password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost" => 12])]);
                                            header("location: login.php");
                                        }
                                    }
                                }
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