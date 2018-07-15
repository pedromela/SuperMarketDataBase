<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
    $categoria = $_REQUEST['categoria'];
	$ean = $_REQUEST['ean'];
    $fornecedor = $_REQUEST['fornecedor'];
	$fornecedores_secundarios = $_REQUEST['fornecedores_secundarios'];
	$design = $_REQUEST['design'];
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	$sql = "";
	$sql .= "insert into produto values ('$ean', '$design', '$categoria', '$fornecedor', current_date);";
	$fornecedores = explode(" ", $fornecedores_secundarios);	
	$count = count($fornecedores) - 1;
	$i = 0;
	while($i < $count) {
		$sql .= "insert into fornece_sec values ('$fornecedores[$i]', '$ean');";
		$i = $i + 1;
	}
	echo($sql);
	pg_query("BEGIN") or die("Could not start transaction\n");
	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	if ($result) {
		echo "Commiting transaction\n";
		pg_query("COMMIT") or die("Transaction commit failed\n");
	} else {
		echo "Rolling back transaction\n";
		pg_query("ROLLBACK") or die("Transaction rollback failed\n");;
	}
	
    echo("<td><a href=\"produtos.php?categoria\">Back</a></td>\n");

	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
