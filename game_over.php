<?php

$score = $_COOKIE['score'];

setcookie('step', '', time() - 3600);
setcookie('score', '', time() - 3600);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <script>
        const correct = () => {
            alert("correct answer!");
        }
        const incorrect = () => {
            alert("incorrect answer!");
        }
    </script>
</head>
<body>
    <div class="container">
        <div id="quiz-box">


    <h2 class="breadcrumbs">Your final score: <?php echo $score; ?></h2>
    <div>
        <a type="button" href="index.php" class="restart-btn">Restart</a>
    </div>

    </form>
        </div>
    </div>
</body>
</html>
