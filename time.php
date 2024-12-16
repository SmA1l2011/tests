<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/time.css">
</head>

<?php if ($_COOKIE[explode("@", $_SESSION["user"]["email"])[0]]) { ?>
    <body id="body">
<?php } else { ?>
    <body id="body" class="dark">
<?php } ?>
    <form action="results.php" method="post">

        <?php $post = $_POST; ?>
        <?php foreach ($post as $key => $value) { ?>
            <input type="hidden" name="<?= $key; ?>" value="<?= $value; ?>">
        <?php } ?>
        <input type="hidden" name="endTime" value="<?= time(); ?>">
        <input type="submit" name="testEnd" value="подивитись результати" class="button">
            
    </form>
</body>

</html>