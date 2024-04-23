<?php
include './db/config.php';
$db = connect_db();

// Function to search blog posts for live search
function liveSearchBlogPosts($db, $keyword) {

    if ($keyword == "") {
        // Se a string de pesquisa é vazia, busque todos os resultados
        $stmt = $db->prepare("SELECT * FROM posts ORDER BY data_publicacao DESC LIMIT 5");
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
    } else {
        // Caso contrário, busque com base na string de pesquisa
        $stmt = $db->prepare("SELECT * FROM posts WHERE titulo LIKE :keyword OR conteudo LIKE :keyword ORDER BY data_publicacao DESC LIMIT 5");
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
    }

    $stmt->execute();
    $posts = $stmt->fetchAll();

    $hint = "";
    foreach ($posts as $post) {
        $hint .= '<div class="card mb-4">
                    <div class="card-header">' . htmlspecialchars($post["titulo"]) . '</div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">By ' . htmlspecialchars($post["autor"]) . ' on ' . $post["data_publicacao"] . '</h6>
                        <p class="card-text">' . nl2br(htmlspecialchars($post["conteudo"])) . '</p>
                    </div>
                </div>';
    }

    // Set output to "no suggestion" if no hint was found
    // or to the correct values
    if ($hint == "") {
        $response = "No suggestion";
    } else {
        $response = $hint;
    }

    // Output the response
    echo $response;
}

// Get the q parameter from URL
$q = $_GET["q"];

// Lookup blog posts for live search if length of q > 0
if (strlen($q) > 0) {
    liveSearchBlogPosts($db, $q);
}
?>
