<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the new task from the form
  $newTask = $_POST["task"];

  // If the task is not empty, add it to the list
  if (!empty($newTask)) {
    // Retrieve the existing todo list from the session
    if (isset($_SESSION["todoList"])) {
      $todoList = $_SESSION["todoList"];
    } else {
      $todoList = array();
    }

    // Add the new task to the list
    $todoList[] = $newTask;

    // Store the updated list in the session
    $_SESSION["todoList"] = $todoList;
  }
}

// Retrieve the todo list from the session
if (isset($_SESSION["todoList"])) {
  $todoList = $_SESSION["todoList"];
} else {
  $todoList = array();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Todo List</title>
</head>

<body>
  <h1>Todo List</h1>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Task: <input type="text" name="task">
    <input type="submit" name="submit" value="Add Task">
  </form>

  <h2>Tasks:</h2>
  <ul>
    <?php
    // Display the todo list
    foreach ($todoList as $task) {
      echo "<li>" . $task . "</li>";
    }
    ?>
  </ul>
</body>

</html>