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
    <form action="task.php" method="post">
        <?php

            $questions = [
                [
                    'question' => 'Яка найдовша річка України?',
                    'answers' => ['Дніпро', 'Дунай', 'Дністер', 'Сіверський Донець'],
                    'correct_answer' => 'Дніпро'
                ],
                [
                    'question' => 'В якому році Україна здобула незалежність?',
                    'answers' => ['1991', '1990', '1992', '1989'],
                    'correct_answer' => '1991'
                ],
                [
                    'question' => 'Яка тварина є символом Австралії?',
                    'answers' => ['Кенгуру', 'Коала', 'Диявол тасманійський', 'Платпус'],
                    'correct_answer' => 'Кенгуру'
                ],
                [
                    'question' => 'Хто написав "Алісу в Країні Чудес"?',
                    'answers' => ['Льюїс Керролл', 'Джон Толкін', 'Брати Грімм', 'Чарльз Діккенс'],
                    'correct_answer' => 'Льюїс Керролл'
                ],
                [
                    'question' => 'Який хімічний елемент має символ H?',
                    'answers' => ['Гідроген', 'Гелій', 'Оксиген', 'Нітроген'],
                    'correct_answer' => 'Гідроген'
                ],
                [
                    'question' => 'Який орган людини відповідає за вироблення інсуліну?',
                    'answers' => ['Підшлункова залоза', 'Печінка', 'Нирки', 'Щитоподібна залоза'],
                    'correct_answer' => 'Підшлункова залоза'
                ],
                [
                    'question' => 'Хто написав "Гамлета"?',
                    'answers' => ['Вільям Шекспір', 'Мігель де Сервантес', 'Фрідріх Шіллер', 'Жан-Жак Руссо'],
                    'correct_answer' => 'Вільям Шекспір'
                ],
                [
                    'question' => 'Який океан є найглибшим?',
                    'answers' => ['Тихий океан', 'Атлантичний океан', 'Індійський океан', 'Північний Льодовитий океан'],
                    'correct_answer' => 'Тихий океан'
                ],
                [
                    'question' => 'Яка країна є найбільшою за площею?',
                    'answers' => ['Росія', 'Канада', 'Китай', 'США'],
                    'correct_answer' => 'Росія'
                ],
                [
                    'question' => 'Хто відкрив Америку?',
                    'answers' => ['Христофор Колумб', 'Васко да Гама', 'Марко Поло', 'Джеймс Кук'],
                    'correct_answer' => 'Христофор Колумб'
                ],
                [
                    'question' => 'Який хімічний елемент має символ Au?',
                    'answers' => ['Золото', 'Срібло', 'Мідь', 'Платина'],
                    'correct_answer' => 'Золото'
                ],
                [
                    'question' => 'Яка тварина є найшвидшою на землі?',
                    'answers' => ['Гепард', 'Лев', 'Вовк', 'Заєць'],
                    'correct_answer' => 'Гепард'
                ]
            ];

            shuffle($questions);
            for ($i = 0; $i < 12; $i++) { 
                shuffle($questions[$i]['answers']);
            }
            echo "<input type='submit' class='button' value='розпочати тест' name='start'>";
            echo "<input type='hidden' name='questions' value='" . json_encode($questions) . "'>";

        ?>
    </form>
</body>

</html>