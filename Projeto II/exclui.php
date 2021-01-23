<?php
include'conexao.php';
include'header.php'; 
try{
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if($id){
		$del = "DELETE FROM mensagem WHERE id = ". $id;
		$teste = $pdo->exec($del);
		if($teste == 1){
			$mensagem = ['tipo'=>'success', 'descricao'=>'Sucesso!', 'mensagem'=>'Mensagem excluida com sucesso!'];
		}
		else{
			$mensagem = ['tipo'=>'danger', 'descricao'=>'Erro!', 'mensagem'=>'Erro ao excluir mensagem!'];
		}
	}
	else{
		$mensagem = ['tipo'=>'danger', 'descricao'=>'Erro!', 'mensagem'=>'Erro ao excluir mensagem!'];
	}
}
catch(PDOException $e){
	$mensagem = ['tipo'=>'danger', 'descricao'=>'Erro!', 'mensagem'=>'Erro ao excluir mensagem!<br>'.$e->getMessage()];
}
if(isset($mensagem)){?>
	<div class="<?php echo 'alert '. $mensagem['tipo']; ?>">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
		<strong><?php echo $mensagem['descricao']; ?></strong> <?php echo $mensagem['mensagem']; ?>
	</div>
<?php } ?>
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
				</table>
			</div>
		</div>
	</div>
</body>
<?php include'footer.php'; ?>