<html>
    <body>
        <h3>Adicionar Categoria</h3>
        <form action="update_categoria.php" method="post">
            <p>Nova Categoria: <input type="text" name="nome"/></p>
			<select name="select">
				<option value="simples">Categoria Simples</option>
				<option value="super">Super Categoria</option>
			</select>
			<p><input type="hidden" name="super_categoria" value="<?=$_REQUEST['super_categoria']?>"/></p>			
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>