<html>
<body>

<form action="ToDoDatabase.php" method="post">
Task: <input type="text" name="taskname">
<input type="submit" value="Add">
</form>

<?php

if(!empty($_POST) && isset($_POST["taskname"])) { 
    echo "Please enter a task and click the add button.";
   } else {
    $taskname_input = $_POST["taskname"];
    $filtered_task = (filter_var($taskname_input, FILTER_SANITIZE_STRING));
   }
}
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "to_do_list";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO todo (task) VALUE('$taskname_input')";
    $conn->exec($sql);

    $task = $conn->prepare("SELECT task FROM todo"); 
    $task->execute();

    // set the resulting array to associative
    $task->setFetchMode(PDO::FETCH_ASSOC);
    $results = $task->fetchAll();
    foreach ($results as $key => $value) {
?>
      <li> <?php echo $value["task"]; ?></li> 
<?php
    }

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>
<?php

/*
 try {
    


    $task = "SELECT task FROM todo";
    
    $conn->exec($sql);
    $conn->exec($task);

    echo "Task added<br>";


} catch (PDOException $e) {

    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

*/ ?>

<div>

</div>

</body>
</html>