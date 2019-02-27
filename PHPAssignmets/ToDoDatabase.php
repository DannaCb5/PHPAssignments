<html>
<body>

<!-- Create a Form that has an action "target URL" and a method "How the form is sent" in input for a todo list entry and a submit button -->
<form action="ToDoDatabase.php" method="post">
Task: <input type="text" name="taskname">
<input type="submit" value="Add">
</form>

<!-- Declare the global variables used in this file. -->
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "to_do_list";

// Add a try/catch Exception Handler to catch a specified change to the normal flow, save the code state and send an error message to the page. 
try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check to see if there is a form entry. If there is then assign the from entry $_POST["taskname"] to the variable $taskname_input, sanitize that variable or remove tags, remove or encode characters. Assign the ISERT INTO string to the variable $sql so that it can be used in multible places. Execute the connection to the which inserts a value $taskname_input as a record into the table todo.  If the form entry 
    if(!empty($_POST) && isset($_POST["taskname"])) { 
        $taskname_input = $_POST["taskname"];
        $filtered_task = (filter_var($taskname_input, FILTER_SANITIZE_STRING));
        $sql = "INSERT INTO todo (task) VALUE('$taskname_input')";
        $conn->exec($sql);
    } else {
    echo "Please enter a task and click the add button.";
    }
    $task = $conn->prepare("SELECT * FROM todo"); 
    $task->execute();
    // Set the resulting array to associative which are arrays with named keys, fetch those results and assign them to $results
    $results = $task->fetchAll(PDO::FETCH_ASSOC);

    // Loop the for each result the id value.  You should loop as many times as the amount of records you have.  The loop will create a list of each task value then attach a form with no field to each value to be used as a delete button.
    foreach ($results as $key => $value) {
?>
      <li> <?php echo $value["task"]; ?></li> 
           <form action="ToDoDatabase.php" method="post">
               <input type="text" value= "<?php echo $value['id']; ?>" name='id' hidden>
               <input type= "submit" value= "Done">
           </form>
<?php
    }   
    $id_input='$_POST["id"]';
    function delTask($id_input, $conn) {
        $sql = "DELETE FROM todo WHERE id = $id_input";
        $conn->exec($sql);
    }
    if(!empty($id_input)) {
    delTask($id_input, $conn);
    }
?>
<?php
} catch (PDOException $e) {
    echo 'Message: ' .$e->getMessage();
}
    $conn = null;
?>

</body>
</html>