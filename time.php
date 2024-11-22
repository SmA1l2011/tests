<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="results.php" method="post">

        <?php $post = $_POST; ?>
        <?php foreach ($post as $key => $value) { ?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
        <?php } ?>
        <input type="hidden" name="endTime" value="<?php echo time(); ?>">
        <input type="submit" name="testEnd" value="подивитись результати" class="button">
            
    </form>
</body>

</html>