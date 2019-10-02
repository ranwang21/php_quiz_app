<?php

// read the json file into a variable object
$questions = json_decode(file_get_contents('./questions.json'), true);
var_dump($questions); // test


echo "<br />";
echo "break===========";
echo "<br />";

/**
 * Return random question from json
 * @return a random question
 */
function getRandomQuestion(){
    global $questions;
    return $questions[random_int(0, count($questions) - 1)];
}