<?php

$datetimepicker = $_POST['datetimepicker'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email=$_POST['email'];
$cartype = implode(',',$_POST['cartype']);
$carcondition = implode(',',$_POST['carcondition']);
$seattype = implode(',',$_POST['seattype']);

$connection = mysqli_connect("localhost", "motofixi_novo", "C@rwash123","motofixi_novo"); // Establishing Connection with Server
//$db = mysqli_select_db("novo_db", $connection); // Selecting Database from Server

if($name !=''||$mobile !=''){
//Insert Query of SQL
//echo "insert into sofa_cleaning(Name, Mobile) values ('$name', '$mobile')";
$query = mysqli_query($connection,"insert into completecar_cleaning(Name, Mobile, Date_time, Car_type, Car_condition, Seat_type) values ('$name', '$mobile', '$datetimepicker', '$cartype','$carcondition', '$seattype' )");
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}

//mysqli_close($connection); // Closing Connection with Server


require 'PHPmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'box497.bluehost.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreply@novowash.com';                 // SMTP username
$mail->Password = '@-PG?5[\OjmB2Q';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to




$mail->setFrom('noreply@novowash.com', 'The Novowash Team');
$mail->addAddress($email , 'User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('noreply@novowash.com', 'Information');
//$mail->addCC('rohan@novowash.com');
$mail->addBCC('swayamprst@gmail.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your booking has been registered';
$mail->Body    = '<p style="font-size:18px">Dear '.$name.',<br><br>Thank you for placing a request for a service with Novowash. Our team will get back to you shortly. Kindly call us on <b>011-49040734</b> for furthur assistance.<br><br>Regards,<br>Team Novowash.</p>';
$mail->AltBody = 'Thank you for placing a request for service with Novowash. Our team will get back to you shortly. Kindly call us on 011-49040734for furthur assistance.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

$authkey="139044AtNd5OQYPUN588eed7b";
$route=4;
$country=91;
$code=91;
$sender="NOVOWS";
$message="Dear ".$name.", Thank you for booking with Novowash. Our team will get back to you shortly!";
$alert=919599868771;
$alertmessage = "Booking done: name ".$name." ,number ".$mobile." and email ".$email;


$vars="authkey=".$authkey."&mobiles=".$code.$mobile."&message=".$message."&sender=".$sender."&route=".$route."&country=".$country;
   
	$curl = curl_init('https://control.msg91.com/api/sendhttp.php?');
	curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
	$result=curl_exec($curl);
	curl_close($curl);
	
$alertvars="authkey=".$authkey."&mobiles=".$alert."&message=".$alertmessage."&sender=".$sender."&route=".$route."&country=".$country;
   
	$curl = curl_init('https://control.msg91.com/api/sendhttp.php?');
	curl_setopt($curl, CURLOPT_POSTFIELDS, $alertvars);
	$result=curl_exec($curl);
	curl_close($curl);



?>