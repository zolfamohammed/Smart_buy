
<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "smart_buy";

	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		//	mysqli_query($conn,"SET NAMES UTF8");
        //   mysqli_query($conn,"SET CHARACTER SET UTF8");
		}
	}
	
	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}

}
?>
<html>
<head> 
<meta charset="UTF">
</head> 

<?php
$host="localhost";
$user="root";
$db="smart_buy";
$conn=mysqli_connect($host,$user,'',$db);
mysqli_query($conn,"SET NAMES UTF8");
mysqli_query($conn,"SET CHARACTER SET UTF8");



?>