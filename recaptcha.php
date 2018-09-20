<?php if ($response . success == false) {
    echo "Your CAPTCHA response was wrong.";
    exit ;
} else {
    // Checking For Blank Fields..
    if ($_POST["name"] == "" || $_POST["email"] == "" || $_POST["subject"] == "" || $_POST["message"] == "") {
        echo "Fill All Fields..";
    } else {
        // Check if the "Sender's Email" input field is filled out
        $email = $_POST['email'];
        // Sanitize E-mail Address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // Validate E-mail Address
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            echo "Invalid Sender's Email";
        } else {
            $to = 'codespaceperu@gmail.com';
            $subject = 'Test';
            $message = $_POST['message'];
            $headers = 'From:' . $email . "\r\n";
            // Sender's Email
            // Message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70, "\r\n");
            // Send Mail By PHP Mail Function
            if (mail($to, $subject, $message, $headers)) {
                echo "Your mail has been sent successfully!";
            } else {
                echo "Failed to send email, try again.";
                exit ;
            }
        }
    }
}
?>