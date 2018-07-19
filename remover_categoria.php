<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
function deleteSuperCategoria($cat) {
	$sql = "select * from constituida where super_categoria='$cat';";
	$result = pg_query($sql) or die('ERROR: 0' . pg_last_error());
	while ($row = pg_fetch_assoc($result))
	{
		$sql_constituida = "DELETE FROM constituida WHERE super_categoria = '{$row['super_categoria']}' AND categoria = '{$row['categoria']}';";
		$result2 = pg_query($sql_constituida) or die('ERROR: 1' . pg_last_error());
		$sql = "select * from super_categoria where nome='{$row['categoria']}';";
		$result2 = pg_query($sql) or die('ERROR: 2' . pg_last_error());
		$num = pg_num_rows($result2);
		if($num == 1) {
			$row2 = pg_fetch_assoc($result2);
			deleteSuperCategoria($row2['nome']);
			$sql = "DELETE FROM super_categoria WHERE nome = '{$row2['nome']}';DELETE FROM categoria WHERE nome = '{$row2['nome']}';";
			$result2 = pg_query($sql) or die('ERROR: 3' . pg_last_error());
		} else {
			$sql = "select * from categoria_simples where nome='{$row['categoria']}';";
			$result2 = pg_query($sql) or die('ERROR: 4' . pg_last_error());
			$num = pg_num_rows($result2);
			if($num == 1) {
				$row2 = pg_fetch_assoc($result2);
				$sql = "DELETE FROM categoria_simples WHERE nome = '{$row2['nome']}';DELETE FROM categoria WHERE nome = '{$row2['nome']}';";
				$result2 = pg_query($sql) or die('ERROR: 5' . pg_last_error());
			}
		}
	}
}
	$categoria= $_REQUEST['categoria'];
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	
	$sql = "select * from super_categoria where nome='$categoria';";
	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	$num = pg_num_rows($result);
	if($num == 1) {
		$row = pg_fetch_assoc($result);
		deleteSuperCategoria($row['nome']);
		$sql = "DELETE FROM super_categoria WHERE nome = '{$row['nome']}';DELETE FROM categoria WHERE nome = '{$row['nome']}';";
		$result = pg_query($sql) or die('ERROR: -1' . pg_last_error());
	}
	$sql = "select * from categoria_simples where nome='$categoria';";
	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	$num = pg_num_rows($result);
	if($num == 1) {
		$row = pg_fetch_assoc($result);
		$sql = "DELETE FROM constituida WHERE categoria = '{$row['nome']}';DELETE FROM categoria_simples WHERE nome = '{$row['nome']}';DELETE FROM categoria WHERE nome = '{$row['nome']}';";
		$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	}
	
    echo("<td><a href=\"ver_categoria.php?categoria={$super_categoria}\">Back</a></td>\n");

		
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
