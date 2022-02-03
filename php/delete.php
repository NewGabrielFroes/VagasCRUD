<?php  

if(isset($_GET['id_candidato'])){
   include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id_candidato = validate($_GET['id_candidato']);

   
   $sql = "DELETE FROM registro
            WHERE candidato_id=$id_candidato";
      
	$sql2 = "DELETE FROM candidato
	        WHERE id_candidato=$id_candidato";

   $result = mysqli_query($conn, $sql);
   $result2 = mysqli_query($conn, $sql2);

   if ($result and $result2) {
   	  header("Location: ../read.php?success= deletado com sucesso");
   }else {
      header("Location: ..d/read.php?error=ERRO&$user_data");
   }

}else {
	header("Location: ../read.php");
}