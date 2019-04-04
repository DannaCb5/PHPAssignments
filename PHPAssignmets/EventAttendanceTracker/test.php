<body>
<form action="" method="post">
    <input type="text" name="formUName" placeholder="Enter your User Name" required>
    <input type="password" name="formPWord" placeholder="Enter your password" required>
    <input type="submit" name="submit" value="Submit">
</form>
<?php

if(isset($_POST["submit"])){
    echo "User Name and password have been authenticated";
} else {
    echo "You didn't enter anything.";
}
?>
<!-- ------------------------------------------------------------------- -->
</body>
</html>
