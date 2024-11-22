<?php require("questions.php"); ?>
<?php session_start(); ?>
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
    <form action="time.php" method="post">
        
        <?php if (!isset($_SESSION["user"])) { ?>
            <?php header("location: index.php"); ?>
        <?php } ?>
        <?php $startTime = time(); ?>
        <?php for ($i = 0; $i < $questionsNum; $i++) { ?>
            <div class='question-block'>
                <p class='question'><?php echo $questions2[$i]['question']; ?></p>
                <input type="hidden" name="<?php echo $i; ?>" value="<?php echo $questions2[$i]['question']; ?>">
                <div class='answer-block'>
                <?php foreach ($questions2[$i]['answers'] as $answer) { ?>
                    <div class="reletive">
                        <input type='radio' class='answer' value='<?php echo $answer; ?>' id="<?php echo $answer; ?>" name="<?php echo "answer" . $i; ?>">
                        <label for="<?php echo $answer; ?>" class='answerL'><?php echo $answer; ?></label>
                    </div>
                <?php } ?>
                </div>
            </div>
        <?php } ?>
        <input type='hidden' value='<?php echo $questionsNum; ?>' name='questionsNum'>
        <input type='hidden' value='<?php echo $startTime; ?>' name='startTime'>
        <input type='submit' class='answer' value='готово' name='answer'>
            
    </form>
</body>

</html>