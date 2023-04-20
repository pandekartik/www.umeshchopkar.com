<?php

// EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to_1 = "pande.kartik@gmail.com";
    $email_to_2 = "umeshchopkar@gmail.com";
    $email_subject = "Umesh Chopkar Lead: ".$_POST['subject']; ;
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        // !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        // !isset($_POST['telephone']) ||
        !isset($_POST['mobile_number'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['name']; // required
    // $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    // $telephone = $_POST['telephone']; // not required
    $comments = $_POST['mobile_number']; 
    $email_body = $_POST['msg'];

 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    // $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    // $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Mobile Number: ".clean_string($comments)."\n";
    $email_message .= "Message ".clean_string($email_body)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to_1, $email_subject, $email_message, $headers);  
@mail($email_to_2, $email_subject, $email_message, $headers);  
header( "refresh:2;urL=http://www.umeshchopkar.in/contact.html" );

echo 'Thank You for showing intrest. We will contact you soon.';

?>