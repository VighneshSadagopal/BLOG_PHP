<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
 
}
else{
    header("Location: login.php");
}
$id=$_GET['id'];
$author=$_SESSION['username'];




$sql=mysqli_query($conn,"UPDATE `users` SET `usertype`='user' WHERE id='$id' ");

if($sql){
    $sql1=mysqli_query($conn,"UPDATE `policy` SET `status`='checked' WHERE id='$id' ");
    if($sql1){

        $qry=mysqli_query($conn,"SELECT * FROM users WHERE id='$id' ");
        $row=mysqli_fetch_assoc($qry);

    
        $filename = 'policy.pdf'; 
        $path = 'files'; 
        $file = $path . "/" . $filename; 
     
        $mailto = $row['email'];
        $subject = 'Your Request For Being Author Is Approved'; 
        $message = 'Congratulations And Welcome on the Authors Board We Are very Happy To Welcome You And Eagerly Waiting To See Your Content On Our Website.A Copy Of Policy Is Sent to You Please Read Again When You Get Time.'; 
     
        $content = file_get_contents($file); 
        $content = chunk_split(base64_encode($content)); 
     
        // a random hash will be necessary to send mixed content 
        $separator = md5(time()); 
     
        // carriage return type (RFC) 
        $eol = "\r\n"; 
     
        // main header (multipart mandatory) 
        $headers = "From: vighneshp65@gmail.com" . $eol; 
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
        $body .= "Content-Type: application/octet-stream; name=\"" .$filename . "\"" . $eol; 
        $body .= "Content-Transfer-Encoding: base64" . $eol; 
        $body .= "Content-Disposition: attachment" . $eol; 
        $body .= $content . $eol; 
        $body .= "--" . $separator . "--"; 
     
        //SEND Mail 
        if (mail($mailto, $subject, $body, $headers)) { 
           header("location:admin.php?info=sent");
        } else { 
            echo "Mail not Sent"; 
            print_r( error_get_last() ); 
        } 
    }
    else{
        echo "error";
    }
}
else{
    echo "failure";
}

?>
