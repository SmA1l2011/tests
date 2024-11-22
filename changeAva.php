<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body class="changeAvaBody">
    <?php require "changeAvaBack.php"; ?>
    <form action="profile.php" method="post" enctype="multipart/form-data" class="changeAva">
        <input type="file" name="ava" class="button">
        <input type="submit" name="sendAva" class="button">
    </form>
</body>
</html>