<?php
header("content-type: text/plain");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: "origin, x-requested-with, content-type"');
header('Access-Control-Allow-Methods "GET, POST, OPTIONS"');
if(isset($_POST['userName']) && !empty($_POST['userName'])) {
  $name = $_POST['userName'];
  $computedString = "Post Success: Hi, " . $name . "!";
} else if(isset($_GET['userName']) && !empty($_GET['userName'])) {
  $name = $_GET['userName'];
  $computedString = "GET Success: Hi, " . $name . "!";
} else if (isset($_POST)) {
  $name = $_POST;
  $computedString = "Seems like there was something wrong with your POST " . $name . "!";
} else if (isset($_GET)) {
  $name = $_GET;
  $computedString = "Seems like there was something wrong with your GET " . $name . "!";
} else {
  $name = "no name";
  $computedString = "Seems like my error handling is broke " . $name . "!";
}
// $name = (isset($_POST['userName'])) ? $_POST['userName'] : 'no name';
// $computedString = "Hi, " . $name . "!";
$array = ['userName' => $name, 'computedString' => $computedString];
echo json_encode($array);