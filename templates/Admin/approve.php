<?php

include '../classes/autoload.php';

session_start();

if (isset($_SESSION['username'])) {
} else {
    header("Location:../headers/login.php");
}
$id = $_GET['id'];
$author = $_SESSION['username'];


$usertype = 'user';
$user = new Users;


$data = ['id' => $id, 'usertype' => $usertype];
$sql=$user->updateUsertype($data);


if ($sql) {
    $policy = new Policy;
    $sql1 = $policy->updatePolicy($id);
    if ($sql1) {
        $que= $user->getUserById($id);
        foreach ($que as $row) {
            $filename = 'policy.pdf';
            $path = '../../files';
            $file = $path . "/" . $filename;
           
            require '../../PHPMailer/PHPMailer.php';
            require '../../PHPMailer/SMTP.php';
                $mail = new PHPMailer;
                $mail->setFrom('vighneshp65@gmail.com');
                $mail->addAddress($row['email']);
                $mail->Subject = 'Policy Message and Confirmation';
                $mail->Body = 'Hello! Congratulation and welcome to Family . From Today You Will an Author and you can post Blog post ';
                $mail->addAttachment('../../files/policy.pdf');
                $mail->IsSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Username = 'Vighneshp65@gmail.com';
                $mail->Password = 'Karthik2**';
                if(!$mail->send()) {
                   
                echo 'Email is not sent.';
                echo 'Email error: ' . $mail->ErrorInfo;
                } else {
                    header('Location: admin.php?info=sent');
                echo 'Email has been sent.';
                }

        }
    }else {
        echo "error";
    }
} else {
    echo "failure";
}
