<!DOCTYPE html>
<html>
<head>
	<title>Azure Submission 1</title>
</head>
<body>
	<h1>Register Here</h1>
	<label>Fill in your name and email address, then click Submit to register.</label>
	<form>
	<table method="post" action="index.php" enctype="multipart/form-data">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Job</td>
			<td><input type="text" name="job"></td>
		</tr>
		<tr>
			<td><button name="submit">Submit</button></td>
			<td><button name="load">Load Data</button></td>
		</tr>
	</table>
	</form>
</body>
</html>
<?php  

	$serverName = "dicodingwebapps.database.windows.net";
	$user = "dicoding";
	$pass = "Dadangkole0";
	$db = "dicodingwebapp";

	$connectionOptions = array(
		"Database" => $db,
		"Uid" => $user,
		"PWD" => $pass
	);

	$conn = sqlsrv_connect($serverName, $connectionOptions);
	$sql  = "create table dadangkonelo (id int(25))";

	$getResult = sqlsrv_query($conn, $sql);
	/*echo ("Reading data from table".PHP_EOL);*/

	if($getResult == FALSE){
		echo (sqlrv_errors());
	}

	/*while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    }*/
    sqlsrv_free_stmt($getResults);
    echo $getResults;
	/*try{
		$connect = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
		$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e){
		echo "Failed: ".$e;
	}*/
?>