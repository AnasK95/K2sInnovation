<?php  
$errors = '';
$myemail = 'anasskhann786@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['phone']) )
   
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$city = $_POST['city']; 
$purpose = $_POST['purpose']; 
$phone = $_POST['phone']; 
$details = $_POST['details']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{

$to = $myemail;

$email_subject = "Customer  Name: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n City: $city \n Phone: $phone \n\n Purpose: $purpose \n Details: $details \n  ".

"Email: $email_address\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

//redirect to the 'thank you' page

header('Location: contact-form-thank-you.html');

}
?>