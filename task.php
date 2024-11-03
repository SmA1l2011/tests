<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/task.css">
</head>

<body>
    <form action="intermediate.php" method="post">
        <?php

            if ($_POST) {
                if (isset($_POST['points'])) {
                    $points = $_POST['points'];
                } else {
                    $points = 0;
                }

                if (isset($_POST['startTime'])) {
                    $startTime = $_POST['startTime'];
                } else {
                    $startTime = time();
                }

                if (isset($_POST['count'])) {
                    $count = $_POST['count'];
                } else {
                    $count = 0;
                }

                $questions = json_decode($_POST['questions'], true);
            }

            echo "<div class='question-block'>";
                echo "<p class='count'>" . $count + 1 . "/" . count($questions) . "</p>";
                echo "<p class='question'>" . $questions[$count]['question'] . "</p>";
                echo "<div class='answer-block'>";
                foreach ($questions[$count]['answers'] as $answer) {
                        echo "<input type='submit' class='answer' value='$answer' name='answer'>";
                    }
                    echo "<input type='hidden' name='questions' value='" . json_encode($questions) . "'>";
                    echo "<input type='hidden' name='points' value='$points'>";
                    echo "<input type='hidden' name='count' value='$count'>";
                    echo "<input type='hidden' name='startTime' value='$startTime'>";
                echo "</div>";
            echo "</div>";
            
        ?>
    </form>
</body>

</html>