<?php 
include "../conect/config.php";
if(isset($_POST['send'])){
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	if($email== NULL || $subject== NULL || $message== NULL){
		echo '<script> alert("Please Enter All The Information ");</script>';
		
		}else{
	$to="zolfa35@gmail.com";
	$subject=wordwrap($_POST['subject'],70);
	$message=$_POST['message'];
	$from="From:".$_POST['email'];
	
	mail($to,$subject,$message,$from);
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