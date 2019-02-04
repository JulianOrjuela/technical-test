<?php   
   

if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $_POST['email'];
    $email_subject = "Send Email From Technical Test";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['f_name']) ||
        !isset($_POST['l_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['address']) ||
        !isset($_POST['city'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
    $f_name = $_POST['f_name'];  //required
    $l_name  = $_POST['l_name']; //required
    $email = $_POST['email']; //required
    $address = $_POST['address']; //required
    $postal = $_POST['postal']; //required
    $city = $_POST['city']; //required
    $psw = $_POST['psw']; //required
    $psw_repeat = $_POST['psw_repeat']; //required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($f_name)."\n";
    $email_message .= "Last Name: ".clean_string($l_name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "Postal Code: ".clean_string($comments)."\n";
    $email_message .= "City: ".clean_string($city)."\n";
    $email_message .= "Password: ".clean_string($psw)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<?php
 
}
?>
 
?>