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
	
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
		
	$sql = "SELECT DISTINCT super_categoria FROM constituida WHERE super_categoria NOT IN(select categoria from constituida);";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);

	echo("<h3>Categorias</h3>");

   	echo("<table border=\"1\">\n");
	echo("<tr><th>Nome</th></tr>");
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["super_categoria"]}</td>");
        echo("<td><a href=\"ver_categoria.php?categoria={$row['super_categoria']}\">Ver</a></td>\n");
		echo("</tr>");
	}
	
	$sql = "select * from categoria_simples where nome not in(select categoria from constituida);";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);
	
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["nome"]}</td>");
		echo("</tr>");
	}
	echo("<tr>");
    echo("<td><a href=\"adicionar_categoria.php?super_categoria=\">Adicionar</a></td>\n");	
	echo("</tr>");
	echo("</table>");
	
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
