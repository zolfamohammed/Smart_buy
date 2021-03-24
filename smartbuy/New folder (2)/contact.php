<?php 
include "../conect/config.php";
$error='';
$name='';
$email='';
$subject='';
$message='';
function clean_text($string){
	$string=trim($string);
	$string= stripslashes($string);
	$string=htmlspecialchars($string);
	return $string;
	
	}
if(isset($_POST["send"])){
	if(empty($_POST["name"]))
	{
		$error .= '<p><label>Please Enter Your Name</label></p>';
	}else{
			$name= clean_text($_POST["name"]);
			if(!preg_match("/^[a-zA-Z]*$/",$name))
				{
				$error .='<p><label></label> only letters and white space allowed</p>';
				}
			
		}
	
	if(empty($_POST["email"]))
	{
		$error .= '<p><label>Please Enter Your Email</label></p>';
	}else{
			$email= clean_text($_POST["email"]);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
				$error .='<p><label></label> Invalid email format</p>';
				}
			
		}
		
	if(empty($_POST["subject"]))
	{
		$error .= '<p><label>Please Enter The subject</label></p>';
	}else{
			$subject= clean_text($_POST["subject"]);
			
			
		}
		
	if(empty($_POST["message"]))
	{
		$error .= '<p><label>Please Enter The Message</label></p>';
	}else{
			$message= clean_text($_POST["message"]);
		 }
	
	     if($error != ''){
			 
			 require '../phpmail/class.phpmailer.php';
			 require '../phpmail/class.smtp.php';
			 $mail = new PHPMailer;
			 $mail->isSMTP();
			 $mail->Host ='smtpout.secureservar.net';
			 $mail->Port = 80;
			 $mail->SMTPAuth = true;
			 $mail->Username='Write your SMTP username';
			 $mail->Pssword='SMTP Password';
			 $mail->SMTPSecure ='';
			 $mail->From=$_POST["email"];
			 $mail->FromName=$_POST["name"];
			 $mail->addAddress('zolfa35@gmail.com','Name');
			 $mail->addCC($_POST["email"],$_POST["name"]);
			 $mail->WordWrap=50;
			 
			 $mail->isHTML(true);
			 $mail->Subject=$_POST["subject"];
			 $mail->Body=$_POST["message"];
			 if($mail->send()){
				 $error ='<label>Thank You For Contacting Us</label>';
				 }else{ 
					 $error ='<label>there is an Error</label>';
					 }
					 	$name='';
						$email='';
						$subject='';
						$message='';
			 }
	}
?>
<?php


				$editsql="select * from sitsetting ";
				$editres=mysql_query($editsql);
				$editrow=mysql_fetch_array($editres);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../fontawesome-free-5.6.3-web/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="../css/contactstyl.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$editrow['site_name'];?></title>
</head>

<body>
	 <h1 align="center" style="margin-top:6%;"> Contact US</h1>
	<div class="table" style="margin-top:3%;">
    <form method="post" enctype="multipart/form-data" >
        <div class="row"><?php echo $error; ?></div>
        <div class="row">
                
                <div class="col-75"><input type="text" name="name" placeholder="Enter Your name.."/></div>
        </div>
        <div class="row">
                
                <div class="col-75"><input type="email" name="email" placeholder="Enter Your Email.."/></div>
        </div>
        
         <div class="row">
                
                <div class="col-75"><input type="text" name="subject" placeholder="Enter Your Subject.." /></div>
         </div>
         <div class="row">
             	
                <div class="col-75"> <textarea name="message" placeholder="Enter Your message.." cols="30" rows="10">  </textarea></div>  
  				
         </div>
         <div class="row">
               <input type="submit" name="send" value="send">
              
          </div>
           <a href="index.php"><i class="far fa-arrow-alt-circle-left" style="font-size:25px;color:#000"></i></a>
    </form>
    </div>
</body>
</html>