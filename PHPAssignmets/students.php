<?php
$servername = "localhost";
$username = "root";
$password = "root";


try {
    $conn = new PDO("mysql:host=$servername; dbname=employees", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE employee SET lastname='Peter' WHERE id=2";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    echo $stmt->rowCount() . "records UPDATED successfully";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>