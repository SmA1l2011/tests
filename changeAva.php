<?php session_start(); ?>
<?php require "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <?php if ($_SESSION["user"]["email"] == "ADMIN_PRO_MAX@gmail.com") { ?> 
        <link rel="stylesheet" href="css/ADMprofile.css">
    <?php } ?> 
</head>
<?php if ($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]]) { ?>
    <body class="changeAvaBody">
<?php } else { ?>
    <body class="changeAvaBody dark">
<?php } ?>
    <?php if ($_SESSION["user"]["email"] !== "ADMIN_PRO_MAX@gmail.com") { ?> 
        <form action="changeAva.php" method="post" class="theme">
            <input type="submit" value="світла" name="light">
            <input type="submit" value="темна" name="dark">
        </form>
    <?php } ?>
    <?php require "changeAvaBack.php"; ?>
    <form action="profile.php" method="post" class="changeAva" enctype="multipart/form-data">
        <h2>Зміна Аватарки:</h2>
        <input type="file" name="ava" class="button">
        <h2>Зміна Імені:</h2>
        <input type="text" value="<?php echo $_SESSION["user"]["userName"]; ?>" name="newName" placeholder="введіть своє нове ім'я" maxlength="50">
        <div class="end-block">
            <input type="submit" name="done" value="готово" class="done hov-one">
            <input type="submit" name="cancel" value="скасувати" class="done hov-two">
        </div>
    </form>
</body>
</html>