<?php
    // get user's answer from post method
    $answer = trim(filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_STRING));

    // check if the correct answer submited
    if($answer !== "" && $answer !== null){
        // get cookie step
        $step = $_COOKIE['step'];
        // check if game is not over (step < 10)
        if($step < 10){
        // increment step number
        $step++;
        // reset cookie
        setcookie('step', $step,  time()+3600);
        // redirect
        header('location:index.php');
        }else{
        // redirect to game over page
        header('location:game_over.php');
        }
    } else{
        // get cookie step and score
        $step = $_COOKIE['step'];
        $score = $_COOKIE['score'];
        // check if game is over
        if($step < 10){
        // increment step number and decrease score number
        $step++;
        $score--;
        // reset cookie
        setcookie('step', $step,  time()+3600);
        setcookie('score', $score,  time()+3600);
        // redirect
        header('location:index.php');
        } else {
        // redirect to game over page
        header('location:game_over.php');
        }
    }