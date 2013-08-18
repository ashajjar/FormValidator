<?php
/**
 * Configuration
 */
/**
 * Enter the e-mail to which you want the form to be sent to.
 * @var String the main E-Mail
 */
$to="example@yourdomain.com";
/**
 * Enter the e-mail to which you want the form to be sent to.
 * @var String a chain of e-mail addresses simi-colon(;) separated.
 */
$cc="example1@yourdomain.com;example2@yourdomain.com;example3@yourdomain.com";
/**
 * Enter the e-mail to which you want the form to be sent to.
 * @var String a chain of e-mail addresses simi-colon(;) separated.
 */
$bcc="example4@yourdomain.com;example5@yourdomain.com;example6@yourdomain.com";

/**
 * Don't change under this line
 */

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "To: $to \r\n";
$headers .= "From: $email \r\n";
$headers .= "CC: $cc \r\n";
$headers .= "BCC: $bcc \r\n";

$message  ='
<table width="600" border="0" cellspacing="0" cellpadding="3" dir="'._DIR.'" style="font-family:Tahoma, Geneva, sans-serif">
	<tr>
		<td colspan="2" stl="stl">This message is sent to you from you website </td>
	</tr>
	<tr>
		<td width="114"><b>Name :</b></td><td width="474">'.$name.'</td>
	</tr>
	<tr>
		<td><b>E-Mail:</b></td><td>'.$email.'</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2"><b>Subject : '.$subject.'</b></td>
	</tr>
	<tr>
		<td colspan="2">'.$message.'</td>
	</tr>
</table>';

$s = @mail($to, $subject, $message, $headers);
if($s) echo "sent" ;	
else echo "failed";

?>