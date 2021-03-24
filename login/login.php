<?php
	include("include/db.php");
	
?>
<?php


				$editsql="select * from sitsetting ";
				$editres=mysql_query($editsql);
				$editrow=mysql_fetch_array($editres);
 ?>
<html >
    <head>
    	
    	<link rel="stylesheet" type="text/css" href="../css/login_style.css" />
        <style>
			a{text-decoration:none; color:black;}
			a:hover{color:#2fce98;}
		</style>
        <title><?=$editrow['site_name'];?></title>
    </head>
    <body >
    	<div class="homepage">
        	<h2><a href="../smartbuy/index.php">Home Page</a></h2>
        </div>
    	<div class="form"  >   
            <form action="include/checklog.php" method="post" >
                <label>Login Name</label>
                <input type="text" name="username" placeholder="Enter Your Login Name.."/>
                <label>password</label>
                <input type="password" name="password" placeholder="Enter Your Password.." />
                <input type="submit" name="login" value="login" />   
            </form>
           	<div align="center" ><a href="create_account.php">Create Account</a></div>
        </div>
    </body>
</html>
