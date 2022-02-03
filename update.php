<?php include 'php/update.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php/update.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Atualizar</h4><hr><br>
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
		           value="<?=$row['name'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="email">Email</label>
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?=$row['email'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="cpf">CPF</label>
		     <input type="text" 
		           class="form-control" 
		           id="cpf" 
		           name="cpf" 
		           value="<?=$row['cpf'] ?>">
		   </div>

		   <div class="form-group">
		     <label for="cep">CEP</label>
		     <input type="text" 
		           class="form-control" 
		           id="cep" 
		           name="cep" 
				   value="<?=$row['cep'] ?>">
		   </div>

		   <div class="form-group">
			   <label for="id_vaga">Vaga</label>
			   <br>
				<select name="id_vaga" id="id_vaga">
					<?php				
						include "db_conn.php"; 
						$sql = "SELECT v.titulo, v.id_vaga FROM vaga v, candidato c, registro r 
						WHERE v.empresa_id = r.empresa_id and $id_candidato = r.candidato_id";
						$result = mysqli_query($conn, $sql);
						$result_row = mysqli_fetch_assoc($result);
						$id_vaga = $result_row['id_vaga'];
					?>
					<option selected value="<?php echo $id_vaga;?>">
						<?php echo $result_row['titulo'];?>
					</option>
					<?php				
						include "db_conn.php"; 
						$result_vaga = mysqli_query($conn, "SELECT * FROM vaga WHERE id_vaga != $id_vaga");
						while($row_vaga = mysqli_fetch_assoc($result_vaga)){ ?>
							<option value="<?php echo $row_vaga['id_vaga'];?>">
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
						$id_candidato = $row['id_candidato'];
						$sql2 = "SELECT e.nome, e.id_empresa FROM empresa e, vaga v, candidato c, registro r 
						WHERE e.id_empresa = r.empresa_id and $id_candidato = r.candidato_id";
						$result = mysqli_query($conn, $sql2);
						$result_row = mysqli_fetch_assoc($result);
						$id_empresa = $result_row['id_empresa'];
					?>
					<option selected value="<?php echo $id_empresa;?>">
						<?php echo $result_row['nome'];?>
					</option>
					<?php
						$result_empresa = mysqli_query($conn, "SELECT * FROM empresa WHERE id_empresa != $id_empresa");
						while($row_empresa = mysqli_fetch_assoc($result_empresa)){ ?>
							<option value="<?php echo $row_empresa['id_empresa'];?>">
								<?php echo $row_empresa['nome'];?>
							</option> <?php
						}
					?>
				</select>
		   </div>

		   <input type="text" 
		          name="id_candidato"
		          value="<?=$row['id_candidato']?>"
		          hidden >

		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">Atualizar</button>
		    <a href="read.php" class="link-primary">Visualizar</a>
	    </form>
	</div>
</body>
</html>