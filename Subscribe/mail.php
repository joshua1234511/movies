<?php
include ("../Config/config.php");
require("../sendgrid-php/sendgrid-php.php");
$sendgrid = new SendGrid('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');
$sql = "SELECT email as co FROM email";
$email = new SendGrid\Email();
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){  
while ($row = mysql_fetch_assoc($result)) {
$to = $row['co'];
$subject = "Movie Updates";
$txt = "New Movie Released/Updated!";
 
$email
    ->addTo($to)
    ->setFrom('subscribe@movies.sj')
    ->setSubject('Update')
    ->setText('New Release')
    ->setHtml('<strong>New Movie Released This Week!</strong>')
;
}
}


try {
    $sendgrid->send($email);
} catch(\SendGrid\Exception $e) {
   header('Location: '.$error); 
   
}


if($result){
	echo "<script>window.close();</script>";
}
else{
	header('Location: '.$error); 
}