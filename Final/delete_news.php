<?php
include './db/config.php';
$db = connect_db();

// Obtém os dados enviados via POST
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['id'])) {
    $newsId = $data['id'];

    // Prepara a query SQL
    $stmt = $db->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $newsId);

    // Executa a query
    if($stmt->execute()) {
        echo json_encode(['message' => 'Notícia removida com sucesso.']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Erro ao remover a notícia.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'ID da notícia não fornecido.']);
}
?>