<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
	$nif = $_REQUEST['nif'];
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	
	$sql = "DELETE FROM fornecedor WHERE nif = '$nif';";
	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
    echo("<td><a href=\"fornecedores.php\">Back</a></td>\n");

		
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
