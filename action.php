<?php
 
if($_POST) {
    $Name = "";
    $Email = "";
    $Message = "";
    $email_body = "<div>";
     
    if(isset($_POST['Name'])) {
        $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Name:</b></label>&nbsp;<span>".$Name."</span>
                        </div>";
    }

    if(isset($_POST['Email'])) {
        $Email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['Email']);
        $Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$Email."</span>
                        </div>";
    }
     
    if(isset($_POST['Message'])) {
        $Message = htmlspecialchars($_POST['Message']);
        $email_body .= "<div>
                           <label><b>Message:</b></label>
                           <div>".$Message."</div>
                        </div>";
    }
    $recipient = "simsch538@gmail.com";
    $email_body .= "</div>";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
?> Read More: Create a Contact Form in PHP
