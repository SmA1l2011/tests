<?php require "functions.php"; ?>
<?php require "questions.php"; ?>
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

<?php if ($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]]) { ?>
    <body id="body">
<?php } else { ?>
    <body id="body" class="dark">
<?php } ?>
    <form action="time.php" method="post">
        <?php if (!isset($_SESSION["user"]) || $_SESSION["user"]["email"] == "ADMIN_PRO_MAX@gmail.com") { ?>
            <?php header("location: index.php"); ?>
        <?php } ?>
        <?php $startTime = time(); ?>
        <?php for ($i = 0; $i < $questionsNum; $i++) { ?>
            <div class='question-block'>
                <p class='question'><?= $questions2[$i]['question']; ?></p>
                <input type="hidden" name="<?= $i; ?>" value="<?= $questions2[$i]['question']; ?>">
                <div class='answer-block'>
                    <?php foreach ($questions2[$i]['answers'] as $answer) { ?>
                        <div class="reletive">
                            <input type='radio' class='answer' value='<?= $answer; ?>' id="<?= $answer; ?>" name="<?= "answer" . $i; ?>">
                            <label for="<?= $answer; ?>" class='answerL'><?= $answer; ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <input type='hidden' value='<?= $questionsNum; ?>' name='questionsNum'>
        <input type='hidden' value='<?= $startTime; ?>' name='startTime'>
        <input type='submit' class='button' value='готово' name='answer'>
    </form>
</body>

</html>