<!DOCTYPE html>
<html>
<head>
	<title>Criar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php/create.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Candidato</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>

		   <div class="form-group">
		     <label for="name">Nome</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Coloque seu nome completo">

		   </div>

		   <div class="form-group">
		     <label for="email">Email</label>
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>"
		           placeholder="Coloque seu email">
		   </div>

		   
		   <div class="form-group">
		     <label for="cpf">CPF</label>
		     <input type="text" 
		           class="form-control" 
		           id="cpf" 
		           name="cpf" 
		           value="<?php if(isset($_GET['cpf']))
		                           echo($_GET['cpf']); ?>"
		           placeholder="Coloque seu CPF">
		   </div>

		   <div class="form-group">
		     <label for="cep">CEP</label>
		     <input type="text" 
		           class="form-control" 
		           id="cep" 
		           name="cep" 
		           value="<?php if(isset($_GET['cep']))
		                           echo($_GET['cep']); ?>"
		           placeholder="Coloque seu CEP">
		   </div>

		   <div class="form-group">
			   <label for="id_vaga">Vaga</label>
			   <br>
				<select name="id_vaga" id="id_vaga">
					<?php				
						include "db_conn.php"; 
						$result_vaga = mysqli_query($conn, "SELECT * FROM vaga");
						while($row_vaga = mysqli_fetch_assoc($result_vaga)){ ?>
							<option selected value="<?php echo $row_vaga['id_vaga'];?>">
								<?php echo $row_vaga['titulo'];?>
							</option> <?php
						}

					?>
				</select>
		   </div>

		   <div class="form-group">
			   <label for="id_empresa">Empresa</label>
			   <br>
				<select name="id_empresa" id="id_empresa">
					<?php				
						include "db_conn.php"; 
						$result_empresa = mysqli_query($conn, "SELECT * FROM empresa");
						while($row_empresa = mysqli_fetch_assoc($result_empresa)){ ?>
							<option selected value="<?php echo $row_empresa['id_empresa'];?>">
								<?php echo $row_empresa['nome'];?>
							</option> <?php
						}
					?>
				</select>
		   </div>


		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Criar</button>
		    <a href="read.php" class="link-primary">Visualizar</a>
	    </form>
	</div>
</body>
</html>