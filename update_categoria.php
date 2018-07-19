<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
    $super_categoria = $_REQUEST['super_categoria'];
	$nome = $_REQUEST['nome'];
    $select = $_REQUEST['select'];
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	$sql = ";";	
	if($select == 'super') {
		$sql = "insert into categoria values ('$nome');insert into super_categoria values ('$nome');insert into constituida values ('$super_categoria', '$nome');";
		if($super_categoria == '') {
			$sql = "insert into categoria values ('$nome');insert into super_categoria values ('$nome');";
		}
	}
	if($select == 'simples') {
		$sql = "insert into categoria values ('$nome');insert into categoria_simples values ('$nome');insert into constituida values ('$super_categoria', '$nome');";
		if($super_categoria == '') {
			$sql = "insert into categoria values ('$nome');insert into categoria_simples values ('$nome');";
		}
	}
	
	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
    echo("<td><a href=\"ver_categoria.php?categoria={$super_categoria}\">Back</a></td>\n");

		
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
