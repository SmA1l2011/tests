<?php require_once "functions.php"; ?>
<?php require "registerBack.php"; ?>
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
        <h1>Реєстрація</h1>
        <input type="text" name="userName" placeholder="введіть ім'я користувача" value="<?= $_POST["userName"] ?? "" ?>" maxlength="50">
        <input type="text" name="email" placeholder="введіть свій email" value="<?= $_POST["email"] ?? "" ?>" maxlength="50">
        <input type="text" name="phone" placeholder="введіть свій номер телефону" value="<?= $_POST["phone"] ?? "" ?>" maxlength="20">
        <input type="password" name="password" placeholder="введіть свій пароль" maxlength="24">
        <input type="password" name="passwordAg" placeholder="введіть свій пароль повторно" maxlength="24">
        <p><?= $error ?? "" ?></p>
        <a href="login.php">логінізація</a>
        <input type="submit" value="зарейструватись" class="button">
    </form>
</body>
</html>