<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <form action="register.php" method="post" class="form">
        <h1>Регестрація</h1>
        <input type="text" name="userName" placeholder="введіть ім'я користувача" value="<?= $_POST["userName"] ?? "" ?>" maxlength="50">
        <input type="email" name="email" placeholder="введіть свій email" value="<?= $_POST["email"] ?? "" ?>" maxlength="50">
        <input type="password" name="password" placeholder="введіть свій пароль" maxlength="24">
        <input type="password" name="passwordAg" placeholder="введіть свій пароль повторно" maxlength="24">
        <?php require "registerBack.php"; ?>
        <a href="login.php">логінізація</a>
        <input type="submit" value="зарейструватись" class="button">
    </form>
</body>
</html>