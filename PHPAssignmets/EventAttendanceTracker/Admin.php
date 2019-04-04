
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
    $dbname = "admin";
    $tbname = "authenticate";
    $formUName = $_POST["formUName"];
    $formPWord = $_POST["formPWord"];
    $_SESSION["formUName"] = $formUName;
    $_SESSION["formPWord"] = $formPWord;
    $conn = new PDO("mysql:host=$servername;dbname=admin",$user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $stmt = $conn->prepare("SELECT ?, ? FROM authenticate");
    // $stmt->execute();
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    // // $stmt->bindParam(':dbUName', uname);
    // // $stmt->bindParam(':dbPWord', $dbPWord);
    // // $stmt->execute();
    // $results = $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT 1 FROM authenticate WHERE uname=? and pword=?");
    $stmt->execute([$formUName, $formPWord]);
    $userExists = $stmt->fetchColumn();

    echo "Session variables are set."; echo "<br>";
    if ($userExists) {
        echo "User Name and password have been authenticated"; echo "<br>";
    } else { 
        echo "Your User Name and/or Password are not correct";echo "<br>";
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