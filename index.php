<?php

// read the json file into a variable object
function getJson() 
{
    $questions = json_decode(file_get_contents('./inc/questions.json'), true);
    // var_dump($questions);
    return $questions;
}

/**
 * Return random question from json
 * @return array => a random question
 */
function getRandomQuestion(){
    $questions = getJson();
    return $questions[array_rand($questions)];
}

// call the getRandomQuestion and store the question to the variable
$questionToShow = getRandomQuestion();

// construct an array of answer button htmls
$answers = [
    '<input type="submit" class="btn" name="answer" value="' . $questionToShow['correctAnswer'] . '" onClick="correct()"/>',
    '<input type="submit" class="btn" name="answer" value="' . $questionToShow['firstIncorrectAnswer'] . '" onClick="incorrect()"/>',
    '<input type="submit" class="btn" name="answer" value="' . $questionToShow['secondIncorrectAnswer'] . '" onClick="incorrect()"/>'
];

// store the correct answer in a variable
$correctAnswer = $questionToShow['correctAnswer'];

// randomize the order of the answers
shuffle($answers);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs">Question # of #</p>
            <!-- get the question's right and left adder -->
            <p class="quiz">What is <?php echo $questionToShow["leftAdder"]; ?> + <?php echo $questionToShow["rightAdder"]; ?></p>
            <form action="generate_questions.php" method="post">
                <input type="hidden" name="id" value="0" />
                <!-- loop the answer buttons -->
                <?php
                    for($i = 0; $i < 3; $i++){
                        echo $answers[$i];
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>