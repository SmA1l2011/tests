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
    <?php if ($_SESSION["user"]["email"] == "ADMIN_PRO_MAX@gmail.com") { ?> 
        <link rel="stylesheet" href="css/ADMprofile.css">
    <?php } ?>
</head>
<body id="body">
    <div class="main-block">
        <?php require "profileBack.php"; ?>
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
        <form action="profile.php" method="post" class="form">
            <div class="nameReplace-block">
                <input type="submit" value="змінити ім'я" name="nameReplace" class="button">
                <div class="form-block">
                    <?php if (isset($_POST["nameReplace"])) { ?>
                        <input type="text" value="<?php echo $_SESSION["user"]["userName"]; ?>" name="newName" placeholder="введіть своє нове ім'я" maxlength="15">
                        <input type="submit" value="готово" name="done" class="hov">
                        <input type="submit" value="скасувати" name="cancel" class="hov">
                    <?php } else { ?>
                        <input type="text" value="<?php echo $_SESSION["user"]["userName"]; ?>" name="newName" disabled>
                        <input type="submit" value="готово" name="done" disabled>
                        <input type="submit" value="скасувати" name="cancel" disabled>
                    <?php } ?>
                </div>
            </div>
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
                            <?php $points = explode("/", $result[2])[1] ?>
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