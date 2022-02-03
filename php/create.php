<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$cpf = validate($_POST['cpf']);
	$cep = validate($_POST['cep']);
	$empresa_id = validate($_POST['id_empresa']);
	$vaga_id = validate($_POST['id_vaga']);


	$user_data = 'name='.$name. '&email='.$email;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Email is required&$user_data");
	}else {

       $sql = "INSERT INTO candidato(name, email, cpf, cep) 
               VALUES('$name', '$email', '$cpf', '$cep')";
       $result = mysqli_query($conn, $sql);
	   $candidato_id = mysqli_insert_id($conn);

	   $sql2 = "INSERT INTO registro(candidato_id, vaga_id, empresa_id)
				VALUES('$candidato_id', '$vaga_id', '$empresa_id')";
		
	   $result2 = mysqli_query($conn, $sql2);
       if ($result and $result2) {
       	  header("Location: ../read.php?success=criado com sucesso");
       }else {
          header("Location: ../index.php?error=ERRO &$user_data");
       }
	}

}