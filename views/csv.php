<?php

$title = "CSV TESTI";
ob_start();
require "nav.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>$title</title>
</head>

<body>

<p><a href="../">Go home</a></p>
<h1><?php echo $title ?></h1>


<div>
    <h1>Export CSV</h1>
    <form action="" method="post">
      <input type="submit" name="export" value="Export to CSV">
    </form>
    

    
</div>

<?php
require_once "../model/model.php";
?>

</body>
