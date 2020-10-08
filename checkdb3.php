<?php

	$db_host = "localhost";
	$db_user = "admin";
	$db_pw = "admin";
	$db_name = "mysql";
	$link = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
	$query = "SELECT * FROM member";
	$result = mysqli_query($link, $query);
	
	if(mysqli_connect_error($link)){
		echo "MariaDB connection Failed!!", "<br>";
		echo "error: ", mysqli_connect_error();
	} else{
		echo "MariaDB connection Success!!", "<br>";
		echo "<table border = "1">";
		echo "<tr>","<th>","name", "</th>", "<th>", "profile", "</th>","</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>";
			echo  $row['name'];
			echo "</td>","<td>";
			echo  $row['profile'];
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	mysqli_close($link);

?>
