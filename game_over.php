<?php

$score = $_COOKIE['score'];

// reset cookies
setcookie('step', 1, time() + 3600);
setcookie('score', 10, time() + 3600);
?>

<?php include './inc/header.php'?>


    <h2 class="breadcrumbs">Your final score: <?php echo $score; ?></h2>
    <div>
        <a type="button" href="index.php">Restart</a>
    </div>


<?php include './inc/footer.php'?>