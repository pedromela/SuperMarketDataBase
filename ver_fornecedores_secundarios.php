<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$ean = $_REQUEST['ean'];
	$design = $_REQUEST['design'];

	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
		
	$sql = "SELECT * FROM fornecedor WHERE nif in (SELECT nif FROM fornece_sec WHERE ean = '$ean');";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);

	echo("<h3>Fornecedores Secundarios : $design</h3>");

   	echo("<table border=\"1\">\n");
	echo("<tr><th>Nif</th><th>Nome</th></tr>");
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["nif"]}</td>");
		echo("<td>{$row["nome"]}</td>");
		echo("</tr>");
	}
	echo("<br><td><a href=\"index.php\">Home</a></td>\n");
	echo(" <td><a href=\"produtos.php\">Back</a></td>\n");	

	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
