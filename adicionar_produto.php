<html>
	<head>
	<?php 
		$user="ist178876";		// -> replace by the user name
		$host="db.ist.utl.pt";	        // -> server where postgres is running
		$port=5432;			// -> default port where Postgres is installed
		$password="epiphone";	        // -> replace with the passoword
		$dbname = $user;		// -> by default the name of the database is the name of the user
		
		$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
		
		function FornecedoresSecundarios() {
		
			$sql = "SELECT * FROM fornecedor;";

			$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
			$num = pg_num_rows($result);

			while ($row = pg_fetch_assoc($result))
			{
				echo("<label><input type=\"radio\" name=\"{$row['nome']}\"><span onclick=\"document.form.fornecedores_secundarios.value+={$row['nif']}+' ';\">{$row['nome']}</span></label>");
			}
		
			$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
		}
		
		function Fornecedores() {
		
			$sql = "SELECT * FROM fornecedor;";

			$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
			$num = pg_num_rows($result);

			while ($row = pg_fetch_assoc($result))
			{
				echo("<option value=\"{$row['nif']}\">{$row['nome']}</option>");
			}
		
			$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
		}

		function Categorias($cat) {
			if($cat == '') {
				$sql = "SELECT nome FROM super_categoria WHERE nome NOT IN(select categoria from constituida);";

				$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
				$num = pg_num_rows($result);

				while ($row = pg_fetch_assoc($result))
				{
					echo("<label><input type=\"radio\" name=\"radio\"><span onclick=\"document.form.categoria.value=this.innerHTML;\">{$row['nome']}</span></label>");
					Categorias($row['nome']);
				}
		
				$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());	
				
				$sql = "select * from categoria_simples where nome not in(select categoria from constituida);";

				$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
				$num = pg_num_rows($result);

				while ($row = pg_fetch_assoc($result))
				{
					echo("<label><input type=\"radio\" name=\"radio\"><span onclick=\"document.form.categoria.value=this.innerHTML;\">{$row['nome']}</span></label>");
				}
		
				$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());					
			} else {
				echo("<div>");
				$sql = "select categoria from constituida where super_categoria = '$cat' and categoria in(select * from super_categoria);";

				$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
				$num = pg_num_rows($result);
				if($num > 0){
				while ($row = pg_fetch_assoc($result))
				{
					echo("<label><input type=\"radio\" name=\"radio\"><span onclick=\"document.form.categoria.value=this.innerHTML;\">{$row['categoria']}</span></label>");
					echo("<div>");
					Categorias($row['categoria']);
					echo("</div>");
				}
				}
				$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());
				$sql = "select categoria from constituida where super_categoria = '$cat' and categoria in(select * from categoria_simples);";

				$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
	
				$num = pg_num_rows($result);
				while ($row = pg_fetch_assoc($result))
				{
					echo("<label><input type=\"radio\" name=\"radio\"><span onclick=\"document.form.categoria.value=this.innerHTML;\">{$row['categoria']}</span></label>");
				}
				$result = pg_free_result($result) or die('ERROR: ' . pg_last_error());	
				echo("</div>");				
			}
		}
	?>
	<link rel="stylesheet" href="style.css">	
	<style>
    .NestedSelect{display: inline-block; height: 200px; border: 1px Black solid; overflow-y: scroll;}
    .NestedSelect label{display: block; cursor: pointer;}
    .NestedSelect label:hover{background-color: #0092ff; color: White;}
    .NestedSelect input[type="radio"]{display: none;}
    .NestedSelect input[type="radio"] + span{display: block; padding-left: 0px; padding-right: 5px;}
    .NestedSelect input[type="radio"]:checked + span{background-color: Black; color: White;}
    .NestedSelect div{margin-left: 15px; border-left: 1px Black solid;}
    .NestedSelect label > span:before{content: '- ';}
	</style>
	</head>
    <body>
        <h3>Adicionar Produto</h3>
        <form action="update_produto.php" method="post" name="form">
            <p>Novo Ean: <input type="text" name="ean" maxlength="13"/></p>
			<p>Designacao: <input type="text" name="design" maxlength="255"/></p>			
			<p>Categoria:<div class="NestedSelect">
				<?php
					Categorias('');
				?>	
			</div></p>
            <p>Fornecedor: <select name="fornecedor">
				<?php 
					Fornecedores();
				?>
			</select></p>
			<p>Fornecedores Secundarios:<div class="NestedSelect">
				<?php
					FornecedoresSecundarios();
					pg_close($connection);
				?>	
			</div></p>
			<p><input type="hidden" name="categoria"/></p>
			<p><input type="hidden" name="fornecedores_secundarios"/></p>						
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>