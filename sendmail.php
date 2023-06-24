<?php
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        $msg = '<div style="font-size:15px; text-align:left;">
            Hi Admin,<br><br>
            <p>
            New Contact Mail By User<br>
            New Contact Detail given below-<br>
            Name:<b>' . $name . '</b> <br>
            Email:<b>' . $email . '</b> <br>
            Subject:<b>' . $subject . '</b> <br>
            Message:<b>' . $message . '</b> <br>
            </p>
            <br><br><br>
            </div>';
        
        $res = false;
    
        if(mail("yashikasingh650@gmail.com", "New contact", $msg)){
            $res = true;
            if(mail($email, "Thank you", $msg)){
                // Email to user sent successfully
            } else {
                // Failed to send email to user
            }
        } else {
            // Failed to send email to admin
        }
    
        echo $res;
    }
    
    ?>