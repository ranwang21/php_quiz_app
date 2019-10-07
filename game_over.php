<?php

$score = $_COOKIE['score'];

echo "game over";
echo "score: " . $score;

setcookie('step', '', time() - 3600);
setcookie('score', '', time() - 3600);

