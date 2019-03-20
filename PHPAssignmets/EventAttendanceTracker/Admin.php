
<?php
// Start the session
session_start();
?>
<!-- ------------------------------------------------------------------- -->
<body>
<form action="" method="post">
    <input type="text" name="formUName" placeholder="Enter your User Name" required>
    <input type="password" name="formPWord" placeholder="Enter your password" required>
    <input type="submit" value="Submit">
</form>
<?php
// Set session variables
if(isset($_POST["Submit"])){
$servername = "localhost";
$dbUName = "uname";
$dbPWord = "pword";
$dbname = "admin_authentication";
$tbname = "authenticate_formUName_and_password";
$_SESSION["formUName"] = $_POST["formUName"];
$_SESSION["formPWord"] = $_POST["formPWord"];
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $dbUName, $dbPWord);
$stmt = $conn->prepare("SELECT 'uname', 'pword' FROM $tbname");
$stmt->bind_param(':dbUName', 'uname');
$stmt->bind_param(':dbPWord', 'pword');
$stmt->execute();
if (':dbUName' == $_POST["formUName"] && ':dbPWord' == $_POST["formPWord"]) {
    echo "User Name and password have been authenticated";
} else { 
    echo "Your User Name and/or Password are not correct";
}
echo $_POST["formUName"]; echo "<br>";
echo $_POST["formPWord"]; echo "<br>";
echo "Session variables are set.";
} else {
    echo "You didn't enter anything.";
// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
// session_destroy("formUName");
}
?>
<!-- ------------------------------------------------------------------- -->
</body>
</html>
<!-- // datapage.php -->