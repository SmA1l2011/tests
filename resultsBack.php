<?php

    if (isset($_POST["testEnd"])) {
        $questionsNum = $_POST["questionsNum"];
        $points = 0;
        
        for ($i = 0; $i < $questionsNum; $i++) { 
            foreach ($questions as $key => $question) {
                if ($questions[$key]['question'] == $_POST[$i]) {
                    if (isset($_POST["answer" . $i]) && $_POST["answer" . $i] == $questions[$key]['correct_answer']) {
                        $points++;
                    }
                }
            }
        }

        $endTime = $_POST['endTime'];
        $startTime = $_POST['startTime'];
        $percentages = $points / ($questionsNum / 100);

        $usersData = [];
        $usersData[] = $_SESSION["user"]["email"];
        $usersData[] = "$points/$questionsNum";
        $usersData[] = floor($percentages) . "/" . 100;
        $usersData[] = $percentages * (count($questions) / 100) . "/" . 12;
        $usersData[] = date("d.m.y h:i:s", $endTime);
        $usersData[] = date("i:s", $endTime - $startTime);
        putToCsv("csv/testResults.csv", "a+", $usersData);
    }

?>