<html>
    <header>    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lobster|Shadows+Into+Light|ZCOOL+KuaiLe" rel="stylesheet">
    <link rel="stylesheet" href="JobSearch.css"></header>
<body>
<main class="boundary">
    <div>            
        <img class="background.jpg">
        <div class="title">
            <p>Job Search</p>
        </div>

    <form class="questions" action="JobSearch.php" method="post">
Company Name: <input class="justify" type="text" name="companyName"><br>
Company Address: <input class="justify" type="text" name="companyAddress"><br>
Hiring Manager's Name: <input class="justify" type="text" name="companyAddress"><br>
Hiring Manager's Phone Number: <input class="justify" type="tel" name="hMPhone"><br>
Hiring Manager's Email Address: <input class="justify" type="email" name="hMemail"><br>
Initial Contact Date: <input class="justify" type="date" name="contactDate"><br>
Response:<br><br>

None: <input type="radio" name="response" value="none"> 
No jobs available: <input type="radio" name="response" value="noJob"> 
Interviewed: <input type="radio" name="response" value="Interview"> 
Interviewed and rejected: <input type="radio" name="response" value="Interview"> 
<input type="submit" name="addRecord" value="Add">
</form>

    </div>
</main>
> 

<!-- ----------------------------------------------------------------- -->
<!-- Declare the global variables used in this file.  Connect -->

<?php
$dbname = "jobsearch";
include "globVar.php";

//------------------------------------------------------------------------
// Create the function that will be used later to delete a record if the done button is clicked.  This must go before the function call but does not run until called later in the program. I placed it at the top just for organizational purposes.

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
// check to see if the done button is pressed (true).  If it is then run the function delTask($id_input, $conn). This if statement was moved above the form to allow the statement to run before the submit button in the form in pressed. The delTask function will wait for input from submit then execute the command.

if(isset($_POST["submitPressed"])) {
    $id_input=(int)$_POST['id'];
    delTask($id_input, $conn);
} 

//------------------------------------------------------------------------
// Loop the for each result the id value.  You should loop as many times as the amount of records you have.  The loop will create a list of each task value then attach a form with no field to each value to be used as a delete button.

    foreach ($results as $key => $value) {
?>
      <li> <?php echo $value["task"]; ?></li> 
           <form action="JobSearch.php" method="post">
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