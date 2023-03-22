<h1>Editar Usuário</h1>
<?php
// $sql = "SELECT id, nome, email, data_nasc FROM usuarios WHERE id=".$_REQUEST["id"];

// $res = $conn->query($sql);
// $row = $res->fetch_object();

$sql = "SELECT id, nome, email, data_nasc FROM usuarios LIMIT 50 WHERE id=".$_REQUEST["id"];

$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->get_result();

$row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo $row->email; ?> class=" form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" value="<?php echo $row->data_nasc; ?> class=" form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>