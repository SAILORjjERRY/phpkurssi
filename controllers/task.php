<?php
require_once "../model/model.php";
require "common.php";


$projects = get_all_projects();
$tasks = get_all_tasks();

if (isset($_GET['id'])){
    list($id, $project_title, $category) = get_task($_GET['id']);
}


if (isset($_POST['submit'])) {
    $id = null;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    
    $pid = escape(trim($_POST['project_id']));
    $title = escape($_POST['title']); 
    $date = escape($_POST['date']);
    $time = escape($_POST['Time']);


    if (empty($pid) || empty($title) || empty($date) || empty($time)) {
        $error_message = "Title or category empty";
    } else {
        if (titleExists("tasks", $title)) {
            $error_message = "I'm sorry, but looks like \"" . $title . "\" already exists.";
        } else {
        add_task($pid, $title, $date, $time);
        header('Refresh:4; url=tasks_list.php');
        $confirm_message = 'Project added successfully! Moving to tasks list..';
        }
    }
}

require "../views/task.php";

