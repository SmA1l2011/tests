<?php session_start(); ?>
<?php require("questions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/results.css">
</head>

<?php if ($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]]) { ?>
    <body id="body">
<?php } else { ?>
    <body id="body" class="dark">
<?php } ?>
    <form action="results.php" method="post" class='results'>
        <?php require "resultsBack.php"; ?>
        <p>кількість правильних відповідей <b><span class='before'></span><i><?php echo "$points/$questionsNum"; ?></i></b></p>
        <p>кількість балів в відсотках <b><span class='before'></span><i><?php echo floor($percentages) . "/" . 100; ?></i></b></p>
        <p>кількість балів в по 12 бальній системі <b><span class='before'></span><i><?php echo $percentages * (count($questions) / 100) . "/" . 12; ?></i></b></p>
        <p>дата та час проходження тесту <?php echo date("d.m.y h:i:s", $endTime); ?></p>
        <p>ви пройшли тест за <?php echo date("i:s", $endTime - $startTime); ?></p>
        <input type='hidden' id='percentages' name='percentages' value='<?php echo floor($percentages); ?>'> 
        <a href="profile.php" class="button">повернутись до прфілю</a>
        <input type="hidden" name="questionsNum" value="<?= $questionsNum ?>">
        <?php $post = $_POST; ?>
        <?php foreach ($post as $key => $value) { ?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
        <?php } ?>
    </form>
    <script src="js/script.js"></script>
</body>

</html>