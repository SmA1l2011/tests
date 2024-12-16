<?php require "infoBack.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/info.css">
</head>

<body>
    <a href="profile.php">до профілю</a>
    <table>
        <?php foreach ($usersData as $key => $user) { ?>
            <tr>
                <form action="infoResults.php" method="post">
                    <td><?= $key ?></td>
                    <?php if (isset($user[4])) { ?>
                        <td><img src="<?= $user[4] ?>" alt="ava"></td>
                    <?php } else { ?>
                            <td><img src="img/user.svg" alt="ava"></td>
                    <?php } ?>
                    <td><?= $user[0] ?></td>
                    <td><?= $user[1] ?></td>
                    <td><?= $user[2] ?></td>
                    <td><input type="submit" name="sub" value="результати користувачів"></td>
                    <input type="hidden" name="email" value="<?= $user[1] ?>">
                </form>
            </tr>
        <?php } ?>
    </table>
</body>

</html>