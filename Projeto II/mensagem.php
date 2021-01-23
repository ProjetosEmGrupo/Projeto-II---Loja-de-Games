<?php 
include'header.php';
include'conexao.php';
try{
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if($id){
		$sql = "SELECT * FROM mensagem WHERE id = ". $id;
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$mensagem = $stm->fetch(PDO::FETCH_OBJ);
	}
	else{
		$msg = ['tipo'=>'danger', 'descricao'=>'Erro!', 'mensagem'=>'Erro ao listar mensagem.'];
	}
}
catch(PDOException $e){
	$msg = ['tipo'=>'danger', 'descricao'=>'Erro!', 'mensagem'=>'Erro ao listar mensagem. <br>'.$e->getMessage()];
}
if(isset($msg)){?>
	<div class="<?php echo 'alert '. $msg['tipo']; ?>" >
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
		<strong><?php echo $msg['descricao']; ?></strong> <?php echo $msg['mensagem']; ?>
	</div>
<?php } ?>

<body class="fundopadrao">      
	<div class="linha">
		<div class="anuncio">
			<br>
			<br>
			<br>
			<center><h1>Mensagem</h1></center>
			<br>
			<br>
			<br>
			<form name="contato" method="post" action="mailto:<?php echo (isset($mensagem)&&!empty($mensagem)? $mensagem->email.'?subject=Resposta: '.$mensagem->assunto:""); ?>">
					<br>
					<center><h3>Email: </h3></center>
					<br>	
					<div>
						<label for="nome">Nome:</label>
						<?php echo (isset($mensagem)&&!empty($mensagem)? $mensagem->nome:""); ?>
					</div>
					<br>
					<div>
						<label for="email">Email:</label>
						<?php echo (isset($mensagem)&&!empty($mensagem)? $mensagem->email:""); ?>
					</div>
					<br>
					<div>
						<label for="assunto">Assunto:</label>
						
						<?php echo (isset($mensagem)&&!empty($mensagem)? $mensagem->assunto:""); ?>
					</div>
					<br>
					<div>
						<label for="msg">Mensagem:</label>
						
						<?php echo (isset($mensagem)&&!empty($mensagem)? $mensagem->mensagem:""); ?>
					</div>
					<br>
					<br>
					<center>
					<a href="listamensagem.php"/><input class="botao" type="button" value="Voltar" id="voltar"/>
					&nbsp
					<input class="botao" type="submit" value="Responder" id="responder"/>
				</center>
			</form>
			<br>
		</div>
	</div>
</body>
<?php include'footer.php'; ?>