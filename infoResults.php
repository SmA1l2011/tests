<?php require "infoResultsBack.php"; ?>
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
    <a href="info.php">назад</a>
    <table>
        <?php foreach ($resultsData as $key => $result) { ?>
            <?php if ($result[0] == $_POST["email"]) { ?>
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
            <?php if ($result[0] == $_POST["email"]) { ?>
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
</body>
</html>