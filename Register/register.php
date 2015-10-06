<?php
include ("../Config/config.php");
require("../sendgrid-php/sendgrid-php.php");
$sendgrid = new SendGrid('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');
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$fname=test_input($_POST['fname']);
$lname=test_input($_POST['lname']);
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];
$country=$_POST['country'];
$postal=$_POST['postal'];
$email1=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO user(fname,lname,gender,birthday,country,postal,email,password)values('$fname','$lname','$gender','$birthday', '$country','$postal', '$email1', '$password')";
$result = mysql_query($sql);

$email = new SendGrid\Email();
$email
    ->addTo($email1)
    ->setFrom('register@movies.sj')
    ->setSubject('Sign Up')
    ->setText('Registration sucessfull')
    ->setHtml('<strong>Welcome!</strong>')
;
$sendgrid->send($email);
if($result){
header('Location: '.$login); 
}
else{
header('Location: '.$error); 
}