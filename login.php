<?php require_once "functions.php"; ?>
<?php require "loginBack.php"; ?>
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
    <form action="login.php" method="post" class="form">
        <h1>Логінізація</h1>
        <input type="email" name="email" placeholder="введіть свій email" value="<?= $_POST["email"] ?? "" ?>" maxlength="50">
        <input type="text" name="phone" placeholder="введіть свій номер телефону" value="<?= $_POST["phone"] ?? "" ?>" maxlength="15">
        <input type="password" name="password" placeholder="введіть свій пароль" maxlength="24">
        <p><?= $error ?? "" ?></p>
        <a href="register.php">регестрація</a>
        <input type="submit" value="залогінитись" class="button">
    </form>
</body>
</html>