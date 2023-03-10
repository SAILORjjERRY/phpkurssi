<?php
if (!empty($_GET['id'])) {
    $title = "Update task";
} else {
    $title = "Add task";
}

ob_start();
require "nav.php";
?>

<div class="container">


    <p><a href="../">Go home</a></p>
    <h1><?php echo $title ?></h1>
    

    <?php
    if (isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
    }

    if (isset($confirm_message)) {
        echo "<p class='message_ok'>$confirm_message</p>";
    }
    ?>


<form method="post">
      <label for="project">
      <span>Project:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <select name="project_id" id="project_id" required>
            <option value="">Select a project</option>
            <?php foreach ($projects as $project) { ?>
            <option value="<?php echo $project['id'] ?>">
            <?php echo $project['title'] ?></option>
            <?php } ?>
        </select>

        
    <label for="title">
            <span>Title:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" placeholder="New task" name="title" id="title"
        value="<?php echo $project_title; ?>" required>
        <label for="date">
            <span>Date:</span>
            <strong><abbr title="required">*</abbr></strong>
            </label>
            <input type="date" placeholder="date" name="date" required>
        <label for="time">
            <span>Time:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" placeholder="Time" name="Time" required>
        <input type="submit" name="submit" 
        value="<?php echo (isset($id) and (!empty($id))) ? "Update" : "Add"; ?>">
     </form>
</div>



<style> 
input[type=text] {
    padding:5px; 
    border:2px solid rgb(47, 255, 168);
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

input[type=text]:focus {
    border-color:rgb(47, 255, 168);
}

input[type=submit] {
    padding:5px 15px; 
    background:rgb(47, 255, 168); 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
</style>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
