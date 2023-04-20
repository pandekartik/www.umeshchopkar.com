<?php

// EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to_1 = "pande.kartik@gmail.com";
    $email_to_2 = "umeshchopkar@gmail.com";
    $email_subject = "Umesh Chopkar Lead: Premium Calculation";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['fname']) ||
    !isset($_POST['mname']) ||
    !isset($_POST['lname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['mobile_number']) ||
        !isset($_POST['dob']) ||
        !isset($_POST['income']) ||
        !isset($_POST['term']) ||
        !isset($_POST['ins_req'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['fname']; 
    $mid_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $email_from = $_POST['email']; 
    $mobile_no = $_POST['mobile_number']; 
    $dob = $_POST['dob'];
    $income = $_POST['income'];
    $term = $_POST['term'];
    $ins_req = $_POST['ins_req'];

 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";  
    $email_message .= "Middle Name: ".clean_string($mid_name)."\n"; 
    $email_message .= "Last Name: ".clean_string($last_name)."\n"; 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Mobile Number: ".clean_string($mobile_no)."\n";
    $email_message .= "Date Of Birth:".clean_string($dob)."\n";
    $email_message .= "Income(₹):".clean_string($income)."\n";
    $email_message .= "Term (Yrs):".clean_string($term)."\n";
    $email_message .= "Insurance Requried(₹):".clean_string($ins_req)."\n";
 
// create email headers
/* $headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion(); */
@mail($email_to_1, $email_subject, $email_message, /* $headers */);  
@mail($email_to_2, $email_subject, $email_message, /* $headers */);  
header( "Location:../insurance.html " );

?>