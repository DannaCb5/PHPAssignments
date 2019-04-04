<?php
// You'd put this code at the top of any "protected" page you create
if ( isset( $_SESSION["userName"] && isset( $_SESSION["password"] ) ) {
    if ( ! empty( $_POST ) ) {
        if ( isset( $_POST['userName'] ) && isset( $_POST['password'] ) ) {
            // Getting submitted user data from database
            
            $id = 
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $userName, $password);
            $stmt = $conn->prepare("SELECT 'usename', 'password' FROM $tbname);
            $stmt->bind_param(':userName', $_POST['userName']);
            $stmt->bind_param(':password', $_POST['password']);
            $stmt->execute();
            $result = $stmt->get_result();
            $tbname = $result->fetch_object();
            // Verify user password and set $_SESSION
            if ( password_verify(':userName' = $tbname->'usename' && ':password' = $tbname->'password') ) {
                echo 'User Name and Password verified';
                
            }
        }
    }
    // Grab user data from the database using the userName and password
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location:\PHP-CBC5\PHPAssignmets\EventAttendanceTracker\Admin.php");
}
?>
<body>
    <!-- // FRONT END TEAM :   please note I need a navigation to
    <a href="eventCreate.php">Add a new event</a> -->
    <h1>The Augusta Clubhou.se Event Page</h1>
    <form>Select your event:
        <!-- /insert option value="" to instruct user on the drop-down box functionality/ -->
        <select name="Events" id="Events"><option value="">--Please choose an event--</option>
            <option value="Web-Development">Web Development</option>
            <option value="Project-Manager">Project Manager</option>
            <!-- /insert a new option with unique id to insert new Event from createEvent.php/ -->
            <option id="createEvent" value=""></option>         
        </select>
        <input type="button" id="patronRegistration" onclick="toPatron()" value="Patron Registration"><br>
        <input type="button" id="eventReport" value="Event Report" onclick="toEvent()" >
    </form>
    <body>

