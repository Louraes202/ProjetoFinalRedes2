<?php
include './db/config.php';
$db = connect_db();

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT id, titulo, conteudo, data_publicacao FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    $news = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($news) {
        echo json_encode($news);
    } else {
        echo json_encode(["error" => "Notícia não encontrada."]);
    }
} else {
    echo json_encode(["error" => "ID da notícia não fornecido."]);
}
?>
