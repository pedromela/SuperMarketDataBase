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
		
	$sql = "SELECT * FROM produto;";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);

	echo("<h3>Produtos</h3>");

   	echo("<table border=\"1\">\n");
	echo("<tr><th>Ean</th><th>Designacao</th><th>Categoria</th><th>Nif Fornecedor</th><th>Data</th><th>Fornecedores Sec</th><th></th></tr>");
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["ean"]}</td>");
		echo("<td><a href=\"editar_design.php?ean={$row["ean"]}\">{$row["design"]}</a></td>");
		echo("<td>{$row["categoria"]}</td>");
		echo("<td>{$row["forn_primario"]}</td>");
		echo("<td>{$row["data_produto"]}</td>");
		echo("<td><a href=\"ver_fornecedores_secundarios.php?ean={$row["ean"]}&design={$row["design"]}\">Ver</a></td>\n");
	    echo("<td><a href=\"remover_produto.php?ean={$row["ean"]}\">Remover</a></td>\n");
		echo("</tr>");
	}
	echo("<tr>");
    echo("<td><a href=\"adicionar_produto.php\">Adicionar</a></td>\n");
	echo("</tr>");
	echo("</table>");
	
	echo("<br><td><a href=\"index.php\">Home</a></td>\n");
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
