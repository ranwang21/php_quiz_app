<?php

// set cookies if not exist
if (!isset($_COOKIE['step']) && !isset($_COOKIE['score'])) {
    setcookie('step', 1, time() + 3600);
    setcookie('score', 10, time() + 3600);
}

/**
 * read the json file and return the file in an encapsuled array
 * @return array => questions
 */
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
function getRandomQuestion()
{
    $questions = getJson();
    // randomlize questions
    shuffle($questions);
    $step = $_COOKIE['step'];
    return $questions[$step - 1];
}

/**
 * print the current step (question number)
 */
function getCurrentStep()
{
    echo $step = $_COOKIE['step'];

}

// call the getRandomQuestion and store the question to the variable
$questionToShow = getRandomQuestion();

// construct an array of answer button htmls
$answers = [
    '<input type="submit" class="btn" name="correct" value="' . $questionToShow['correctAnswer'] . '"/>',
    '<input type="submit" class="btn" name="incorrect" value="' . $questionToShow['firstIncorrectAnswer'] . '"/>',
    '<input type="submit" class="btn" name="incorrect" value="' . $questionToShow['secondIncorrectAnswer'] . '"/>',
];

// randomize the order of the answers before show on html
shuffle($answers);

?>

<?php include './inc/header.php'?>


            <p class="breadcrumbs">Question <?php echo $_COOKIE['step']; ?> of 10</p>
            <!-- get the question's right and left adder -->
            <p class="quiz">What is <?php echo $questionToShow["leftAdder"]; ?> + <?php echo $questionToShow["rightAdder"]; ?></p>
            <form action="check.php" method="POST">
                <input type="hidden" name="id" value="0" />
                <!-- loop the answer buttons -->
                <?php
for ($i = 0; $i < 3; $i++) {
    echo $answers[$i];
}
?>
</form>
        </div>

<?php include './inc/footer.php'?>