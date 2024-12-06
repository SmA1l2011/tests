<?php session_start(); ?>
<?php require_once "functions.php"; ?>
<?php require "profileBack.php"; ?>
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
    <body id="body">
<?php } else { ?>
    <body id="body" class="dark">
<?php } ?>
    <?php if ($_SESSION["user"]["email"] !== "ADMIN_PRO_MAX@gmail.com") { ?> 
        <form action="profile.php" method="post" class="theme">
            <label for="light"><input type="submit" value="світла" name="light" id="light"></label>
            <label for="dark"><input type="submit" value="темна" name="dark" id="dark"></label>
        </form>
    <?php } ?>
    <div class="main-block">
        <form action="changeAva.php" method="post" enctype="multipart/form-data" class="name-block">
            <input type="submit" name="file" id="file">
            <?php foreach ($usersData as $key => $user) { ?>
                <?php if ($user[1] == $_SESSION["user"]["email"] && isset($user[3])) { ?>
                    <label for="file"><img src="<?= $user[3]; ?>" alt="user"></label>
                <?php } ?>
                <?php if ($user[1] == $_SESSION["user"]["email"] && !isset($user[3])) { ?>
                    <label for="file"><img src="img/user.svg" alt="user"></label>
                <?php } ?>
            <?php } ?>
            <p><?= $_SESSION["user"]["userName"]; ?></p>
        </form>
        <?php if ($_SESSION["user"]["email"] !== "ADMIN_PRO_MAX@gmail.com") { ?> 
            <form action="task.php" method="post" class="form">
                <input type="submit" value="розпочати тестування" class="button green">
            </form>
        <?php } else { ?>
            <form action="info.php" method="post" class="form">
                <input type="submit" value="інформація користувачів" class="button green">
            </form>
        <?php } ?>
        <form action="changeAva.php" method="post" class="form">
            <input type="submit" value="редагувати профіль" name="exit" class="button green">
        </form>
        <form action="profile.php" method="post" class="form">
            <input type="submit" value="вийти з акаунту" name="exit" class="button red">
            <?php if ($_SESSION["user"]["email"] !== "ADMIN_PRO_MAX@gmail.com") { ?> 
                <input type="submit" value="видалити акаунт" name="delete" class="button red">
            <?php } ?>
        </form>
    </div>
    <?php if ($_SESSION["user"]["email"] !== "ADMIN_PRO_MAX@gmail.com") { ?> 
        <div class="main-block">
            <p class="last-results">результати:</p>
            <table>
                <?php foreach ($resultsData as $key => $result) { ?>
                    <?php if ($result[0] == $_SESSION["user"]["email"]) { ?>
                        <?php if (explode("/", $result[2])[0] > $points) { ?>
                            <?php $points = explode("/", $result[2])[0] ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <tr>
                    <td>номер</td>
                    <td>кількість правильних відповідей</td>
                    <td>в відсотках</td>
                    <td>по 12 бальній системі</td>
                    <td>дата проходження тесту</td>
                    <td>ви пройшли тест за</td>
                </tr>
                <?php foreach ($resultsData as $key => $result) { ?>
                    <?php if ($result[0] == $_SESSION["user"]["email"]) { ?>
                        <?php $count++; ?>
                        <?php if (explode("/", $result[2])[0] == $points) { ?>
                            <tr class="best">
                        <?php } else { ?>
                            <tr>
                        <?php } ?>
                            <td><?= $count?></td>
                            <td><?= $result[1] ?></td>
                            <td><?= $result[2] ?></td>
                            <td><?= $result[3] ?></td>
                            <td><?= $result[4] ?></td>
                            <td><?= $result[5] ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
</body>
</html>