<?php
    
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    
        $msg = '<div style="font-size:15px; text-align:left;">
        <br>
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
        $smesg='Some Error occured, please retry.';
        if(sendMail($email,"yashikasingh650@gmail.com", "New contact", "Hi Admin <br>". $msg)){

            if(sendMail("yashikasingh650@gmail.com", $email, "Thanks for contacting", 'Submitted by you below details <br>' .$msg)){
                $res=true;
            }
        }
        if($res){
            $smesg='your submission is sent succesfully';
        }
        echo $smesg;
        exit();
    }
    function sendMail($sFrom, $toEmail,$subject,$msg){
        $res=false;
        require_once ('PHPMailer6.6.3/src/Exception.php');
        require_once ('PHPMailer6.6.3/src/PHPMailer.php');
        require_once ('PHPMailer6.6.3/src/SMTP.php');

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        //$mail->Debugoutput = 'html';
        $mail->Host = 'smtp.zoho.com';
        $mail->SMTPAuth = true;
        $mail->Username   = "sender@oxyinc.co.in";
        $mail->Password   = "EG28xzcW2Ekw";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
        );
        $mail->Port = '587';
        $mail->setFrom('sender@oxyinc.co.in', $sFrom);
        $mail->addAddress($toEmail);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);   
        $mail->Subject = $subject;
        $mail->msgHTML($msg);
        //$mail->AltBody = $mailbody;
        
        if ($mail->send()) {
            $res=true;
        }
        return $res;
    }
    
    ?>
