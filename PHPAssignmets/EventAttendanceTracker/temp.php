<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo $_SESSION["favcolor"];echo "<br>";
echo $_SESSION["favanimal"];echo "<br>";
echo "Session variables are set.";echo "<br>";
$path = $_SERVER['DOCUMENT_ROOT'];
$path = $_SERVER['DOCUMENT_ROOT'];
echo $path;
?>

</body>
</html>