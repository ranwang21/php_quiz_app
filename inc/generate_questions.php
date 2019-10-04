<?php

// read the json file into a variable object
function getJson() 
{
    $questions = json_decode(file_get_contents(__DIR__ . '/questions.json'), true);
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
    '<input type="submit" class="btn" name="answer" value="' . $questionToShow['correctAnswer'] . '" />',
    '<input type="submit" class="btn" name="answer" value="' . $questionToShow['firstIncorrectAnswer'] . '" />',
    '<input type="submit" class="btn" name="answer" value="' . $questionToShow['secondIncorrectAnswer'] . '" />'
];

// store the correct answer in a variable
$correctAnswer = $questionToShow['correctAnswer'];

// randomize the order of the answers
shuffle($answers);

// echo out the html
for($i = 0; $i < 3; $i++){
    global $answers;
    echo $answers[$i];
}

?>