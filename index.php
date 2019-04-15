<!DOCTYPE html>
<html>
<head>
	<title>Azure Submission 1</title>
</head>
<body>
	<h1>Register Here</h1>
	<label>Fill in your name and email address, then click Submit to register.</label>
	<form method="post" action="index.php" enctype="multipart/form-data">
	<table >
		<tr>
			<td>Nama</td>
			<td><input type="text" name="name" id="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" id="email"></td>
		</tr>
		<tr>
			<td>Job</td>
			<td><input type="text" name="job" id="job"></td>
		</tr>
		<tr>
			<td><button name="submit">Submit</button></td>
			<td><button name="load">Load Data</button></td>
		</tr>
	</table>
	</form>
<?php  

	$host = "dicodingwebapps.database.windows.net";
	$user = "dicoding";
	$pass = "Dadangkole0";
	$db = "dicodingwebapp";

	try{
		$connect = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
		$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}catch(Exception $e){
		echo "Failed: ".$e;
	}


	if(isset($_POST['submit'])){
		try{
			$name = $_POST['name'];
			$email  = $_POST['email'];
			$job = $_POST['job'];

			$connect->exec("INSERT INTO [dbo].[tb_user](name, email, job) values('$name', '$email','$job')");

		}catch(Exception $e){
			echo "Failed: ".$e;
		}
	}	
	

	if(isset($_POST['load'])){
		try{
		$sql = "select * from [dbo].[tb_user]";
		$statement = $connect->query($sql);
		$users = $statement->fetchAll();

		if(count($users > 0)){
			echo "<table>";
			echo "<tr><th>Name<th><th>Email</th><th>Job</th></tr>";

			foreach($users as $user){
				echo "<tr><td>".$user['name']."</td>";
				echo "<td>".$user['email']."</td>";
				echo "<td>".$user['job']."</td></tr>";
			}

			echo "<h3>There is no one data</h3>";
		}
	}catch(Exception $e){
		echo "Failed: ".$e;
	}
	}
?>
</body>
</html>