<?php  

include "db_conn.php";

$sql = "SELECT c.id_candidato, c.name, c.email, c.cpf, c.cep, e.nome, v.titulo 
FROM empresa e, vaga v, candidato c, registro r 
WHERE e.id_empresa = r.empresa_id and v.id_vaga = r.vaga_id and c.id_candidato = r.candidato_id
ORDER BY id_candidato DESC";

$result = mysqli_query($conn, $sql);