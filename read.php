<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Criar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Dados do Candidato</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Email</th>
				  <th scope="col">CPF</th>
				  <th scope="col">CEP</th>
				  <th scope="col">Empresa</th>
				  <th scope="col">Vaga</th>
				  <th scope="col">Ação</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <th scope="row"><?=$i?></th>
			      <td><?=$rows['name']?></td>
			      <td><?php echo $rows['email']; ?></td>
			      <td><?php echo $rows['cpf']; ?></td>
			      <td><?php echo $rows['cep']; ?></td>
				  <td><?php echo $rows['nome']?></td>
				  <td><?php echo $rows['titulo']?></td>
			      <td><a href="update.php?id_candidato=<?=$rows['id_candidato']?>" 
			      	     class="btn btn-success">Atualizar</a>

			      	  <a href="php/delete.php?id_candidato=<?=$rows['id_candidato']?>" 
			      	     class="btn btn-danger">Deletar</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<a href="index.php" class="link-primary">Criar</a>
			</div>
		</div>
	</div>
</body>
</html>