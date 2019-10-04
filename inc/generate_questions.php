<?php

// read the json file into a variable object
$questions = json_decode(file_get_contents('./questions.json'), true);

/**
 * Return random question from json
 * @return array => a random question
 */
function getRandomQuestion(){
    global $questions;
    return $questions[random_int(0, count($questions) - 1)];
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

// echo out the html
for($i = 0; $i < 3; $i++){
    global $answers;
    echo $answers[$i];
}

?>