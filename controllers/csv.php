<?php
require_once "../model/model.php";
require "common.php";

$csv = get_all_csv($query);

if (isset($_POST['export'])) 
    // Retrieve the data from the database
    $query = "SELECT * FROM projects";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Create the CSV file
  $filename = "data.csv";
  $file = fopen($filename, "w");
  
  // Write the header row
  fputcsv($file, array_keys($data[0]));
  
  // Write the data rows
  foreach ($data as $row) {
    fputcsv($file, $row);
  }
  
  // Close the file
  fclose($file);

  header("Content-Type: application/csv");
  header("Content-Disposition: attachment; filename=$filename");
  header("Pragma: no-cache");
  header("Expires: 0");
  readfile($filename);
  exit;

  require "../views/csv.php";
  
?>