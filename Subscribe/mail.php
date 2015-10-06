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
$sendgrid->send($email);
echo "<script>window.close();</script>";
