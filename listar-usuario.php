<h1>Listar Usuários</h1>
<?php
$sql = "SELECT id, nome, email, data_nasc FROM usuarios LIMIT 50";

$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    echo generateTable($res);
} else {
    echo "<p class='alert alert-danger'>Não encontrou resultados!</p>";
}

function generateTable($res) {
    $html = "<table class='table table-hover table-striped table-bordered'>";
    $html .= "<tr>";
    $html .= "<th>ID</th>";
    $html .= "<th>Nome</th>";
    $html .= "<th>E-mail</th>";
    $html .= "<th>Data de nascimento</th>";
    $html .= "<th>Ações</th>";
    $html .= "</tr>";
    while ($row = $res->fetch_object()){
        $html .= "<tr>";
        $html .= "<td>" . $row->id . "</td>";
        $html .= "<td>" . $row->nome . "</td>";
        $html .= "<td>" . $row->email . "</td>";
        $html .= "<td>" . $row->data_nasc . "</td>";
        $html .= "<td>
                    <button onclick=\"location.href='page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button>
                    <button class='btn btn-danger'>Excluir</button>
                    </td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}
?>
