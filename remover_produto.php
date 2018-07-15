<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
	$ean = $_REQUEST['ean'];
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	$sql = "";
	$sql .= "DELETE FROM fornece_sec WHERE ean = '$ean';";
	$sql .= "DELETE FROM produto WHERE ean = '$ean';";
	pg_query("BEGIN") or die("Could not start transaction\n");

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	if ($result) {
		echo "Commiting transaction\n<br>";
		pg_query("COMMIT") or die("Transaction commit failed\n");
	} else {
		echo "Rolling back transaction\n<br>";
		pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
	}
    echo("<td><a href=\"produtos.php?categoria=\">Back</a></td>\n");

		
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
