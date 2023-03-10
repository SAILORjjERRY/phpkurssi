<?php
require "common.php";
$title = 'Tasks list';

ob_start();
require 'nav.php';
?>

<?php
    if (isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
    }

    if (isset($confirm_message)) {
        echo "<p class='message_ok'>$confirm_message</p>";
    }
    ?>

<div class="container">
    <p><a href="../">Go home</a></p>

    <h1><?php echo $title . " (" . $taskCount . ")" ?></h1>

    <?php if ($taskCount == 0) { ?>
    <div>
        <p> You have not yet added any project </p>
        <p><a href='../controllers/project.php'> Add project </a></p>
    </div>
    <?php } ?>

    <ul>
    <?php foreach ($tasks as $task) : ?>
            <li>
            <a href="../controllers/task.php?id=<?php echo $task["id"]; ?>">
                <?php echo $task["title"] ?>
    </a>
            <?php
            echo " (Date:
            ". $task["ttime"] . ", Project: " . $task["project"] .")";

             ?>

            <form method="post">
                <input type="hidden" value="<?php echo $task["id"]; ?>" name="delete">
                <input type="submit" value="Delete">
            </form>
            </li>
            <?php endforeach; ?>

            
    </ul>
</div>

<h1>Task Comments</h1>

<h2>Add comment</h2>
<form action="/task_comments/add/<?php echo $task_id; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment"></textarea>
    <br>
    <input type="submit" value="Submit">
</form>

<?php
$content = ob_get_clean();
include 'layout.php'
?>

