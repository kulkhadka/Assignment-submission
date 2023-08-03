<?php

    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $message = $_POST["message"];
    $subject = $_POST["subject"];
    $fromemail = 'assignmentproject321@gmail.com';  //if u dont have an email create one on your cpanel
    $mailto = 'haruntharu76@gmail.com';  //the email which u want to recv this email

    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From:  <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto,$subject,$body, $headers)) {
        echo "Your Assignment Has Been Successfully Sumited.....:);"; // do what you want after sending the email
        
        
    } else {
        echo "Sorry Fail to Send Your Assignment ... TRY AGAIN!";
        print_r( error_get_last() );
    }