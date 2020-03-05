<?php  
session_start();
include 'config.php';
if(!isset($_SESSION['role']))
       {
           header("Location:login.php");
       }
?>
<html>
	<header>

	</header>
	<body>
		<center>
		<br>
		<form action="logout.php" method="POST">
		<input type="submit" value="Log out" style="width:20%;height:30;" />
		<br>
		</form>
		<table id = 'table' border='1px solid black'>
			<tr>
				<th>Messages</th>
			</tr>
			<?php
				$con= new mysqli($db_server,$db_user,$db_pass,$db_name);
				$sql = "SELECT message FROM messagelog";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
    					while($row = $result->fetch_assoc()) {
        					echo "<tr><td>" . $row["message"] . "</td></tr>";
    					}
				}
				if ($con->connect_error) {
    					die("Connection failed: " . $con->connect_error);
    				}
				$con->close();
			?>
		</center>
		</table>
	</body>
</html>