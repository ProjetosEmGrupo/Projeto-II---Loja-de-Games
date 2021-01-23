<?php 
include'header.php'; 
include 'conexao.php';
$enviar = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
if($enviar){
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$mensagem = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
	$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$insert = $pdo->prepare("INSERT INTO mensagem(nome, mensagem, assunto, email) VALUES (?, ?, ?, ?)");
	if($insert->execute([$nome, $mensagem, $assunto, $email])){
		$tipo = 'success';
		$descricao = 'Sucesso';
		$mensagem = ['tipo'=>'success', 'descricao'=>'Sucesso!', 'mensagem'=>'Mensagem cadastrada com sucesso!'];
		$id = $pdo->lastInsertId();
	}
	else{
		$mensagem = ['tipo'=>'danger', 'descricao'=>'Erro!', 'mensagem'=>'Erro ao cadastrar mensagem!'];
	}
}
if(isset($mensagem)){?>
	<div class="<?php echo 'alert '. $mensagem['tipo']; ?>" >
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
			<center><h1>Contato</h1></center>
			<br>
			<br>
			<br>
			<p><b> Numero Televendas: </b> (11) 9856-3345</p>
			<p><b> Horario de Atendimento Televendas: </b> Das Segunda a Sexta das 9h00 as 18h00.
			Aos Sabados e Feriados : 11h00 as 16h30.</p>
			<p>A Custo de Uma Liga&ccedil;&atilde;o para S&atilde;o Paulo. Cobran&ccedil;as adicionais Podem Ser Geradas...</p>
			<form name="contato" method="post" action="contato.php">
				<br>
				<center><h3>Email: </h3></center>
				<br>	
				<div>
					<label for="nome">Nome:</label>
					<input required="true" class="camposFormato" size="70" type="text" id="nome" name="nome"/>
				</div>
				<br>
				<div>
					<label for="email">Email:</label>
					<input required="true" class="camposFormato" size="70" type="email" id="email" name="email"/>
				</div>
				<br>
				<div>
					<label for="assunto">Assunto:</label>
					<input required="true" class="camposFormato" size="70" type="text" id="assunto" name="assunto"/>
				</div>
				<br>
				<br>
				<div>
					<label for="msg">
						<span id="msg">Mensagem:</span>
					</label>
					<textarea required="true" class="camposFormato" cols="72" rows="4" id="msg" name="msg"></textarea>
				</div>
				<br>
				<center>
					<input class="botao" type="submit" value="Enviar" name="enviar" id="enviar" />
					<input class="botao" type="reset" value="Limpar" id="limpar"/>
				</center>
			</form>
			<br>
		</div>
	</div>
</body>
<?php include'footer.php'; ?>








