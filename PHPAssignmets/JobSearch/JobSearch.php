<html>
    <header>    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lobster|Shadows+Into+Light|ZCOOL+KuaiLe" rel="stylesheet">
    <link rel="stylesheet" href="JobSearch.css"></header>
<body>
<main class="contactEntry">
    <div>            
        <img class="title" src="background.jpg">
        <div>
            <p>Job Search</p>
        </div>

    <form class="questions" action="JobSearch.php" method="post">
Company Name: <input class="justify" type="text" name="companyName" required><br>
Company Address: <input class="justify" type="text" name="companyAddress"><br>
Hiring Manager's Name: <input class="justify" type="text" name="hMName" required><br>
Hiring Manager's Phone Number: <input class="justify" type="tel" name="hMPhone" required><br>
Hiring Manager's Email Address: <input class="justify" type="email" name="hMemail"><br>
Initial Contact Date: <input class="justify" type="date" name="contactDate" required><br>
Response:<br><br>
<div class="radioButtons">
None: <input type="radio" name="response" value="none" required> 
No jobs available: <input type="radio" name="response" value="noJob"> 
Interviewed: <input type="radio" name="response" value="Interview"> 
Rejection Letter: <input type="radio" name="response" value="Interview"> 
Offered Job: <input type="radio" name="response" value="employed"> 
<input type="submit" name="addRecord" value="Add">
</div>
</form>

    </div>
</main>
> 

<!-- form validation did not finish -->
<!-- <form method= "post" action= "handler.php"
<label for "user-input">User <Input type="text" name "donna></label>


foreach($_REQUEST as $key => $value) {
    echo "bla bla bla"
} -->

<?php

// Form Validation example

// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $companyName = test_input($_POST["companyName"]);
  $companyAddress = test_input($_POST["companyAddress"]);
  $hMName = test_input($_POST["hMName"]);
  $hMPhone = test_input($_POST["hMPhone"]);
  $hMEmail = test_input($_POST["hMemail"]);
  $contactDate = test_input($_POST["contactDate"]);
  $response = test_input($_POST["response"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["companyName"])) {
    $companyNameErr = "The Company Name is required";
  } else {
    $companyName = test_input($_POST["companyName"]);
  }

  if (empty($_POST["hMName"])) {
    $hMNameErr = "The Hiring Manager's name is required";
  } else {
    $hMName = test_input($_POST["hMName"]);
  }

  if (empty($_POST["hMPhone"])) {
    $hMPhoneErr = "The Hiring Manager's phone number is required";
  } else {
    $website = test_input($_POST["hMPhone"]);
  }
  if (empty($_POST["contactDate"])) {
    $contactDateErr = "The initial contact date is required";
  } else {
    $gender = test_input($_POST["contactDate"]);
  }
  if (empty($_POST["response"])) {
    $responseErr = "The response from the company is required";
  } else {
    $response = test_input($_POST["response"]);
  }
}
?>

<?php
echo "<h2>Your Input:</h2>";
echo $companyName;
echo "<br>";
echo $companyAddress;
echo "<br>";
echo $hMName;
echo "<br>";
echo $hMPhone;
echo "<br>";
echo $hMEmail;
echo "<br>";
echo $contactDate;
echo "<br>";
echo $response;
?>
</body>
</html>
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

    if(!empty($_POST["companyName"]) && isset($_POST["addRecord"])) { 
        $companyName_input = $_POST["companyName"];
        $filtered_CName = (filter_var($companyName_input, FILTER_SANITIZE_STRING));
        $sql = "INSERT INTO contact ("Company Name", "Company Address", "Hiring Manager Name", "Hiring Manager Number", "Hiring Manager Email", "Initial Contact Date", "Response") VALUES ('$companyName', '$companyAddress', '$hMName', '$hMPhone', '$hMemail', '$contactDate', '$response')";
        $conn->exec($sql);
    } else {
    echo "Please enter contact information and click the add button.";
    }
    $jobSearch = $conn->prepare("SELECT * FROM jobsearch"); 
    $jobSearch->execute();

//------------------------------------------------------------------------
// Set the resulting array to associative which are arrays with named keys, fetch those results and assign them to $printOut

    $printOut = $jobSearch->fetchAll(PDO::FETCH_ASSOC);
//------------------------------------------------------------------------


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