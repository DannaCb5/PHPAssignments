
<?php
// Start the session
session_start();

?>
<!-- ------------------------------------------------------------------- -->
<body>
<form action="" method="post">
    <input type="text" name="formUName" placeholder="Enter your User Name" required>
    <input type="password" name="formPWord" placeholder="Enter your password" required>
    <input type="submit" name="submit" value="Submit">
</form>
<?php

// Set session variables
if(isset($_POST['submit'])) {
$servername = "localhost";
$user = "root";
$password = "root";
$dbUName = "uname";
$dbPWord = "pword";
$dbname = "admin_authentication";
$tbname = "authenticate_username_and_password";
$formUName = $_POST["formUName"];
$formPWord = $_POST["formPWord"];
$_SESSION["formUName"] = $formUName;
$_SESSION["formPWord"] = $formPWord;
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$user,$password);
$stmt = $conn->prepare("SELECT * FROM $tbname WHERE uname = '$formUName'");
$stmt->bindParam(':dbUName', $dbUName);
$stmt->bindParam(':dbPWord', $dbPWord);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "start"; echo $result; echo "end";
echo $formUName; echo "<br>";
echo $formPWord; echo "<br>";
echo $dbUName; echo "<br>";
echo $dbPWord; echo "<br>"; 

echo "Session variables are set."; echo "<br>";
if ($dbUName == $formUName && $dbPWord == $formPWord) {
    echo "User Name and password have been authenticated"; echo "<br>";
} else { 
    echo "Your User Name and/or Password are not correct"; echo "<br>";
}
} else {
    echo "You didn't enter anything."; echo "<br>";
// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
session_destroy();
}
?><!-- ------------------------------------------------------------------- -->
</body>
</html>
<!-- // datapage.php -->