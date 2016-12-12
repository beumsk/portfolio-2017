<?php 
$errors = '';
$myemail = 'remy.beumier@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\nName: $name \nEmail: $email_address \nMessage: \n\n$message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: http://www.remybeumier.esy.es/#contact');
} 
?>
<!DOCTYPE html> 
<html>
<head>
	<title>Contact form handler</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<!-- This page is displayed only if there is some error -->
<div class="well text-center">
	<?php
	echo nl2br($errors);
	?>

	<br>
	<p>Wait 2 seconds or be fast enough to click on the link ! --> <a href="http://www.remybeumier.esy.es/#contact">Send me back !</a></p>
</div>

<?php
header('refresh:2; url=http://www.remybeumier.esy.es/#contact'); // go back to contact after 2sec
?>

</body>
</html>