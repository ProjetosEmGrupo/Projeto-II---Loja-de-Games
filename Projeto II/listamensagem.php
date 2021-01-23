<?php 
include'header.php'; 
include 'conexao.php';
?>
<body class="fundopadrao">
	<div class="linha">
		<div class="anuncio">
			<br>
			<br>
			<br>
			<center><h1>Mensagens</h1></center>
			<br>
			<br>
			<br>
			<div class="lista-produtos">
				<table>
					<tr>
						<th>Nome:</th>
						<th>Assunto: </th>
						<th>Email: </th>
						<th>Ações: </th>
					</tr>
					<?php
					foreach ($pdo->query("SELECT * FROM mensagem order by id desc") as $mensagem){
						?>
						<tr>
							<td><?php echo $mensagem['nome']; ?></td>
							<td><?php echo $mensagem['assunto']; ?></td>
							<td><?php echo $mensagem['email']; ?></td>
							<td class="ajuste-editar">
								<a href="exclui.php?id=<?php echo $mensagem['id']; ?>"><input class="botao" type="submit" value="Excluir" id="editar"/></a>
								&nbsp
								<a href="mensagem.php?id=<?php echo $mensagem['id']; ?>"><input class="botao" type="submit" value="Consultar" id="editar"/></a>
							</td>
						</tr>
					<?php } ?>
					<br>
					<br>
					<br>
					<br>
				</div>
			</table>
			</div>
		</div>
	</div>
</body>
<?php include'footer.php'; ?>