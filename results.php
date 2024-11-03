<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/results.css">
</head>

<body>
    <form action="results.php" method="post">
        <?php
            $questions = json_decode($_POST['questions'], true);
            $points = $_POST['points'];
            $endTime = $_POST['endTime'];
            $startTime = $_POST['startTime'];
            $percentages = $points / (count($questions) / 100);

            echo "<div class='results'>";
                echo "<p>кількість правельних відповідей <b><span class='before'></span><i>$points/" . count($questions) . "</i></b></p>";
                echo "<p>кількість балів в відсотках <b><span class='before'></span><i>" . floor($percentages) . "/100</i></b></p>";
                echo "<p>кількість балів в по 12 бальній системі <b><span class='before'></span><i>" . $percentages * (count($questions) / 100) . "/12</i></b></p>";
                echo "<p>дата та час проходження тесту " . date("d.m.y h:i:s", $endTime) . "</p>";
                echo "<p>ви пройшли тест за " . date("i:s", $endTime - $startTime) . "</p>";
                echo "<input type='hidden' id='percentages' name='percentages' value='" . floor($percentages) . "'>";
            echo "</div>";
        
        ?>
    </form>
    <script src="js/script.js"></script>
</body>

</html>