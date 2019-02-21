<html>
<body>

<form action="ToDo.php" method="post">
Task: <input type="text" name="task">
<input type="submit">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "root";

// try {
//     $conn = new PDO("mysql:host=$servername", $username, $password);

//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     $sql = "CREATE DATABASE To_Do_List";
    
//     $conn->exec($sql);

//     echo "Database Created Successfully<br>";


// } catch (PDOException $e) {

//     echo $sql . "<br>" . $e->getMessage();
// }
// $conn = null;
    
try {
    $conn = new PDO("mysql:host=$servername; dbname=To_Do_List", $username, $password);

    $sql = "CREATE TABLE ToDo (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            task VARCHAR(30) NOT NULL,
            reg_date TIMESTAMP
        )";
    

    $conn->exec($sql);
    
    echo "Table Created Successfully<br>";

} catch (PDOException $e) {

    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>

</body>
</html>