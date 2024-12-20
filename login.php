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
    <h1>Логінізація</h1>
    <form action="login.php" method="post">
        <?php if (isset($error)) { ?>
            <div class="error-block">
                <?= $error ?? "" ?>
                <label for="error"><span></span><input type="submit" name="error" id="error" value=""></label>
            </div>
            <?php unset($error) ?>
        <?php } ?>
        <div class="form">
            <div>
                <label for="email">введіть свій email</label>
                <input type="email" name="email" id="email" value="<?= $_POST["email"] ?? "" ?>" maxlength="50">
            </div>
            <div>
                <label for="phone">введіть свій номер телефону</label>
                <input type="text" name="phone" id="phone" value="<?= $_POST["phone"] ?? "" ?>" maxlength="20">
            </div>
            <div>
                <label for="password">введіть свій пароль</label>
                <input type="password" name="password" id="password" maxlength="24">
            </div>
            <input type="submit" value="залогінитись" class="button">
        </div>
    </form>
    <div class="reg">
        <p>^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^</p>
        <p>Вперше на тестах? <a href="register.php">створіть акаунт</a></p>
    </div>
</body>
</html>