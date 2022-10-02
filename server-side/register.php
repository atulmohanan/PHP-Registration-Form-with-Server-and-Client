<?php

$responses = [
    400 => "Bad Request: ",
    404 => "Not Found: ",
    405 => "Method Not Allowed: ",
    500 => "Internal server error: "
];

$protocol="HTTP/1.1 "?>
<?php
if(isset($_POST['uname']))
{
$uname=$_POST['uname'];
$fname=$_POST['fname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$a=date("y",strtotime($dob));
$year=$a%10;

$e1="please provide user name";
$e2="please provide full name";
$e3="please provide user Email Id";
$e4="please provide Date of Birth";
$messages = [
        1 => " Enter valid email id",
        2 => " Full name must be provided with white space ",
        3 => " User Name must be between 8 and 20 characters long",
        4 => " User Name only contain at least ONE upper case letter one number and one special character",
        5 => " Full Name must only contain characters"
];
//Serverside Validation
if(empty($uname))
 {
  $error =$protocol.$responses[404].$e1;
  $code = 1;
  echo '<span style="color: red; font-size: 15px;">'.$error;'</span>';
 }
else if(empty($fname))
 {
  $error = $protocol.$responses[404].$e2;
  $code = 1;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(empty($email))
 {
  $error = $protocol.$responses[404].$e3;
  $code = 2;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(empty($dob))
 {
  $error = $protocol.$responses[404].$e4;
  $code = 2;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)){
  $error = $protocol.$responses[400].$messages[1];
  $code = 3;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
  $error = $protocol.$responses[400].$messages[5];
  $code = 3;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(strlen($uname) < 8 )
 {
  $error = $protocol.$responses[400].$messages[3];
  $code = 4;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(strlen($uname) > 20 )
 {
  $error = $protocol.$responses[400].$messages[3];
  $code = 4;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$uname)){
  $error=$protocol.$responses[400].$messages[4];
  $code=4;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
 else if(!preg_match("/^[a-z\d]* [a-z\d]*$/i",$fname)){
  $error = $protocol.$responses[400].$messages[2];
  $code = 3;
  echo '<span style="color: red; font-size: 10px;">'.$error;'</span>';
 }
else{
$json= str_shuffle($uname). $year. $year;
$object=json_decode($json); 
$code = 5;
}
}
?>



<?php 
      if(empty($json))
      {
        printf(" ");
      }
      else{
      $object=$json;
      echo '<span style="color: green; font-size: 20px;">Your Password is '.$object;'</span>';
      $decode=json_encode($object);
      }
      ?>