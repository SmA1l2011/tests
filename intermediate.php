<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/intermediate.css">
</head>

<body>
    <?php
        if ($_POST['count'] == 11) {
            echo "<form action='results.php' method='post'>";
            $endTime = time();
            echo "<input type='hidden' name='endTime' value='$endTime'>";
        } else {
            echo "<form action='task.php' method='post'>";
        }

            if ($_POST) {
                $questions = json_decode($_POST['questions'], true);
                $points = $_POST['points'];
                $count = $_POST['count'];
                $startTime = $_POST['startTime'];
                $answer = $_POST['answer'];
                if ($answer == $questions[$count]['correct_answer']) {
                    $points++;
                    echo "<p class='true'>правельно!!</p>";
                } else {
                    echo "<p class='true'>не правельно!!</p>";
                }
                $count++;
            }
            echo "<input type='submit' class='button' value='далі' name='next'>";
            echo "<input type='hidden' name='questions' value='" . json_encode($questions) . "'>";
            echo "<input type='hidden' name='points' value='$points'>";
            echo "<input type='hidden' name='count' value='$count'>";
            echo "<input type='hidden' name='startTime' value='$startTime'>";
        
        echo "</form>";
    ?>
</body>

</html>