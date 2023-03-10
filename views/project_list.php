<?php
require "common.php";
$title = 'Projects list';

ob_start();
require 'nav.php';
?>

<div class="container">
    <p><a href="../">Go home</a></p>

    <h1><?php echo $title . " (" . $projectCount . ")" ?></h1>

    <?php if ($projectCount == 0) { ?>
    <div>
        <p> You have not yet added any project </p>
        <p><a href='../controllers/project.php'> Add project </a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($projects as $project) : ?>
            <li>
            <a href="../controllers/project.php?id=<?php echo $project["id"]; ?>">
                <?php echo $project["title"] ?>

            <form method="post">
                <input type="hidden" value="<?php echo $project["id"]; ?>" name="delete">
                <input type="submit" value="Delete">
            </form>

            </li>
            <?php endforeach; ?>
    </ul>
</div>


<?php
$content = ob_get_clean();
include 'layout.php'
?>