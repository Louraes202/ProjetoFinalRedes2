<?php
include './db/config.php';
$db = connect_db();

$title = $_POST['newsTitle'];
$content = $_POST['newsContent'];

// SQL para inserir notícia
$sql = "INSERT INTO posts (titulo, conteudo) VALUES (:title, :content)";
$stmt = $db->prepare($sql);
$result = $stmt->execute([':title' => $title, ':content' => $content]);

if ($result) {
    echo json_encode(['message' => 'Notícia criada com sucesso.']);
} else {
    echo json_encode(['message' => 'Falha ao criar notícia.']);
}
?>
