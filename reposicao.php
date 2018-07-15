<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
		<h3>Reposicao</h3>
		<form action="reposicao.php" method="post">
            <p>Produto: <select name="ean">
				<?php 
					$ean = $_REQUEST['ean'];
					$user="ist178876";		// -> replace by the user name
					$host="db.ist.utl.pt";	        // -> server where postgres is running
					$port=5432;			// -> default port where Postgres is installed
					$password="epiphone";	        // -> replace with the passoword
					$dbname = $user;		// -> by default the name of the database is the name of the user
	
					$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
					$sql = "SELECT * FROM produto;";

					$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
					$num = pg_num_rows($result);

					while ($row = pg_fetch_assoc($result))
					{
						echo("<option value=\"{$row['ean']}\">{$row['design']}</option>");
					}
		
					$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
				?>
			</select></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
<?php
	if($ean == '') {	
		$sql = "SELECT * FROM reposicao;";
	} else {
		#echo("$ean");
		$sql = "SELECT * FROM reposicao WHERE ean = '$ean';";		
	}
	$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
	$num = pg_num_rows($result);

   	echo("<table border=\"1\">\n");
	echo("<tr><th>Ean</th><th>Unidades</th><th>Parteleira</th><th>Lado</th><th>Altura</th><th>Operador</th><th>Instante</th></tr>");
	while ($row = pg_fetch_assoc($result))
	{
		echo("<tr>");
		echo("<td>{$row["ean"]}</td>");
		echo("<td>{$row["unidades"]}</td>");
		echo("<td>{$row["nro"]}</td>");
		echo("<td>{$row["lado"]}</td>");
		echo("<td>{$row["altura"]}</td>");
		echo("<td>{$row["operador"]}</td>");
		echo("<td>{$row["instante"]}</td>");
	    #echo("<td><a href=\"remover_reposicao.php?ean={$row["ean"]}\">Remover</a></td>\n");
		echo("</tr>");
	}
	echo("<tr>");
    #echo("<td><a href=\"adicionar_reposicao.php\">Adicionar</a></td>\n");
	echo("</tr>");
	echo("</table>");
	
	echo("<br><td><a href=\"index.php\">Home</a></td>\n");
	$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
	pg_close($connection);
?>
    </body>
</html>
