<?php
include './db/config.php';
$db = connect_db();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newsId = $_POST['newsId'];
    $newsTitle = $_POST['newsTitle'];
    $newsContent = $_POST['newsContent'];

    // Atualize os nomes das colunas e da tabela conforme necessário
    $sql = "UPDATE posts SET titulo = :titulo, conteudo = :conteudo WHERE id = :id";
    $stmt = $db->prepare($sql);

    $stmt->execute([
        ':titulo' => $newsTitle,
        ':conteudo' => $newsContent,
        ':id' => $newsId
    ]);

    if ($stmt->rowCount()) {
        echo json_encode(['message' => 'Notícia atualizada com sucesso!']);
    } else {
        echo json_encode(['error' => 'Erro ao atualizar a notícia.']);
    }
} else {
    echo json_encode(['error' => 'Método de solicitação inválido.']);
}
?>
