
<html>

<head>
<link rel="stylesheet" type="text/css" href="email.css">
<title>email validator</title>
</head>
<body>
<div id="main">
<form action "index.php" method="GET">
  <input type="text" name="email"><br>
  <input type="submit" value="Submit">
</form>



<?php
    
/**
 * Example 1
 * Validate a single Email via SMTP
 */


// include SMTP Email Validation Class
require_once('smtp_validateEmail.class.php');

if(isset($_GET['email'])) {



    $email = $_GET['email'];

    //validate that email is actually an address

    if (strpos($email, '.') !== false) {
        // an optional sender
        $sender = 'admin.castrolacademy@castrol.com';
        // instantiate the class
        $SMTP_Validator = new SMTP_validateEmail();
        // turn on debugging if you want to view the SMTP transaction
        $SMTP_Validator->debug = false;
        // do the validation
        $results = $SMTP_Validator->validate(array($email), $sender);
        // view results
        echo $email.' is '.($results[$email] ? 'valid' : '<strong>NOT</strong> valid')."\n";
        // send email? 
        if ($results[$email]) {
            //mail($email, 'Confirm Email', 'Please reply to this email to confirm', 'From:'.$sender."\r\n"); // send email
            } else 
            {
            // echo 'The email addresses you entered is not valid';
            }
        } else {
            echo "Enter an email address to validate";
        }
    }

    else {
            // echo "Enter an email address";
        }
        
    
    





?>
</div>
</body>
</html>
