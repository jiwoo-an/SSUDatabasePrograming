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
		echo "name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; profile <br>";
		while($row = mysqli_fetch_array($result)){
			echo  $row['name'];
			echo "&nbsp;&nbsp;&nbsp;";
			echo  $row['profile'];
			echo"<br>";
		}
	
	}
	mysqli_close($link);

?>
