<?php 

if (isset($_GET['id_candidato'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id_candidato = validate($_GET['id_candidato']);

	$sql = "SELECT * FROM candidato WHERE id_candidato=$id_candidato";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
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
	$candidato_id = validate($_POST['id_candidato']);
	$vaga_id = validate($_POST['id_vaga']);
        $empresa_id = validate($_POST['id_empresa']);
        $id_candidato = validate($_POST['id_candidato']);

	if (empty($name)) {
		header("Location: ../update.php?id=$id_candidato&error=É necessário um nome");
	}else if (empty($email)) {
		header("Location: ../update.php?id=$id_candidato&error=É necessário um e-mail");
	}else {

       $sql = "UPDATE candidato
               SET name='$name', email='$email', cpf='$cpf', cep='$cep'
               WHERE id_candidato=$id_candidato";
       $result = mysqli_query($conn, $sql);

       $sql2 = "UPDATE registro
                SET vaga_id='$vaga_id', empresa_id='$empresa_id'
                WHERE candidato_id=$id_candidato";
        $result2 = mysqli_query($conn, $sql2);

       if ($result and $result2) {
       	  header("Location: ../read.php?success=atualizado com sucesso");
       }else {
          echo $result2;
       }
	}
}else {
	header("Location: read.php");
}