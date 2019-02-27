<html>
<body>

<!-- ----------------------------------------------------------------- -->
<!-- Create a Form that has an action "target URL" and a method "How the form is sent" in input for a todo list entry and a submit button -->

<form action="ToDoDatabase.php" method="post">
Task: <input type="text" name="taskName">
<input type="submit" name=addRecord value="Add">
</form>

<!-- ----------------------------------------------------------------- -->
<!-- Declare the global variables used in this file. -->

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "to_do_list";

//------------------------------------------------------------------------
// create the function that will be used later to delete a record if the done button is clicked.

function delTask($id_input, $conn) {
    $sql = "DELETE FROM todo WHERE id = '$id_input'";
    $conn->exec($sql);
}
//------------------------------------------------------------------------
// Add a try/catch Exception Handler to catch a specified change to the normal flow, save the code state and send an error message to the page. 

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//------------------------------------------------------------------------
// check to see if the done button is pressed (true).  If it is then run the function delTask($id_input, $conn)

    if(isset($_POST["submitPressed"])) {
        $id_input=(int)$_POST['id'];
        delTask($id_input, $conn);
    } 

//------------------------------------------------------------------------
// Check to see if there is a form entry. If there is then assign the from entry $_POST["taskName"] to the variable $taskName_input, sanitize that variable or remove tags, remove or encode characters. Assign the INSERT INTO string to the variable $sql so that it can be used in multible places. Execute the connection to the which inserts a value $taskName_input as a record into the table todo.  If the form entry

    if(!empty($_POST["taskName"]) && isset($_POST["addRecord"])) { 
        $taskName_input = $_POST["taskName"];
        $filtered_task = (filter_var($taskName_input, FILTER_SANITIZE_STRING));
        $sql = "INSERT INTO todo (task) VALUES ('$taskName_input')";
        $conn->exec($sql);
    } else {
    echo "Please enter a task and click the add button.";
    }
    $task = $conn->prepare("SELECT * FROM todo"); 
    $task->execute();

//------------------------------------------------------------------------
// Set the resulting array to associative which are arrays with named keys, fetch those results and assign them to $results

    $results = $task->fetchAll(PDO::FETCH_ASSOC);

//------------------------------------------------------------------------
// Loop the for each result the id value.  You should loop as many times as the amount of records you have.  The loop will create a list of each task value then attach a form with no field to each value to be used as a delete button.

    foreach ($results as $key => $value) {
?>
      <li> <?php echo $value["task"]; ?></li> 
           <form action="ToDoDatabase.php" method="post">
               <input type="text" value= "<?php echo $value['id']; ?>" name='id' hidden>
               <input type= "submit" name="submitPressed" value= "Done">
           </form>
<?php
    }
//------------------------------------------------------------------------
// Catches the classes of execptions stated in the Try part if the exceptions stated in the try section of this handler PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION.

} catch (PDOException $e) {
    echo 'Message: ' .$e->getMessage();
}

//------------------------------------------------------------------------
// Close the connection
    $conn = null;
?>
<!-- ----------------------------------------------------------------- -->
</body>
</html>