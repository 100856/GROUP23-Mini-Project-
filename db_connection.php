<?php
//index.php

$error = '';
$name = '';
$email = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["fname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your FirstName</label></p>';
 }
 else
 {
  $fname = clean_text($_POST["fname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$fname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }

 if(isset($_POST["submit"]))
{
 if(empty($_POST["lname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your LastName</label></p>';
 }
 else
 {
  $fname = clean_text($_POST[";lname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$;lname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }

 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Wrong email format</label></p>';
  }
 }
 
 
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "contact";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (fname, email, lname, message, )
VALUES ('$fname', '$email', '$lname', '$message')";

if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

  $error = '<label class="text-success">New record created successfully </label>';
  $fname = '';
  $email = '';
  $lname = '';
  $message = '';
 }
}

?>