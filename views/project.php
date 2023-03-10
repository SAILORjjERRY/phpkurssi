<?php
if (!empty($_GET['id'])) {
    $title = "Update project";
} else {
    $title = "Add project";
}

/*$title = 'Add Project';*/

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
        <label for="title">
            <span>Title</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" placeholder="New project" name="title" id="title"
        value="<?php echo $project_title; ?>" required>
        <label for="category">
            <span>Category:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <select name="category" id="category" required>
            <option value="">Select a category</option>
            <option value="Professional"
            <?php if ($category == "Professional") {echo ' selected';} ?>>Professional</option>
            <option value="Personal"
            <?php if ($category == "Personal") {echo ' selected';} ?>>Personal</option>
            <option value="School"
            <?php if ($category == "School") {echo ' selected';} ?>>School</option>
        </select>
        <?php if (!empty($id)) { ?>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <?php } ?>
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
