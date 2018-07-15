<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
<?php
    $categoria = $_REQUEST['categoria'];
	$user="ist178876";		// -> replace by the user name
	$host="db.ist.utl.pt";	        // -> server where postgres is running
	$port=5432;			// -> default port where Postgres is installed
	$password="epiphone";	        // -> replace with the passoword
	$dbname = $user;		// -> by default the name of the database is the name of the user
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	if($categoria == '') {
	$sql = "SELECT nome FROM super_categoria WHERE nome NOT IN(select categoria from constituida);";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);
	
	echo("<h3>Categorias</h3>");

   	echo("<table border=\"1\">\n");
	echo("<tr><th>Nome</th><th></th><th></th></tr>");
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["nome"]}</td>");
        echo("<td><a href=\"ver_categoria.php?categoria={$row['nome']}\">Ver</a></td>\n");
        echo("<td><a href=\"remover_categoria.php?categoria={$row['nome']}\">Remover</a></td>\n");
		echo("</tr>");
	}
	$sql = "select * from categoria_simples where nome not in(select categoria from constituida);";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);
	
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["nome"]}</td>");
		echo("<td></td>");
        echo("<td><a href=\"remover_categoria.php?categoria={$row['nome']}\">Remover</a></td>\n");
		echo("</tr>");
	}
	echo("<tr>");
    echo("<td><a href=\"adicionar_categoria.php?super_categoria=\">Adicionar</a></td>\n");	
	echo("</tr>");
	echo("</table>");

	} else {	
	$sql = "select categoria from constituida where super_categoria = '$categoria' and categoria in(select * from super_categoria);";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);

	echo("<h3>Categorias</h3>");

   	echo("<table border=\"1\">\n");
	echo("<tr><th>Nome</th></tr>");
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["categoria"]}</td>");
        echo("<td><a href=\"ver_categoria.php?categoria={$row['categoria']}\">Ver</a></td>\n");
        echo("<td><a href=\"remover_categoria.php?categoria={$row['categoria']}\">Remover</a></td>\n");
		echo("</tr>");
	}
	$sql = "select categoria from constituida where super_categoria = '$categoria' and categoria in(select * from categoria_simples);";

	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);
	
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["categoria"]}</td>");
		echo("<td></td>");
        echo("<td><a href=\"remover_categoria.php?categoria={$row['categoria']}\">Remover</a></td>\n");
		echo("</tr>");
	}
	echo("<td><a href=\"adicionar_categoria.php?super_categoria={$categoria}\">Adicionar</a></td>\n");

	echo("</table>");	
	}
    echo("<td><a href=\"ver_categoria.php?categoria=\">Back</a></td>\n");
    echo("<td><a href=\"index.php\">Home</a></td>\n");

	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
	
?>
    </body>
</html>
