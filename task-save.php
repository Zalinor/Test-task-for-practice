<?php
if(isset($_POST['save'])) {
  $task_name = $_POST['task-name'];
  $subtask_description = $_POST['subtask_description'];
  $subtask_hours = $_POST['subtask_hours'];

  $table = "+----+-------+----------------------------------------------------------------------+\n";
  $table .= sprintf("| %39s |\n", $task_name); 
  $table .= "+----+-------+----------------------------------------------------------------------+\n";
  foreach($_POST['subtask_description'] as $key => $value) {
    $table .= sprintf("| %2d | %5d | %-68s|\n", $key+1, $_POST['subtask_hours'][$key], $value);
    $table .= "+----+-------+----------------------------------------------------------------------+\n";
  }
  $filename = str_replace(' ', '_', $task_name) . ".txt"; 
  file_put_contents($filename, $table, FILE_APPEND); 
}
?>