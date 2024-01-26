<?php
include('navbar.php'); // Inclui a barra de navegação comum
$db = connect_db();


// Function to fetch all posts
function getBlogPosts($db) {
    $stmt = $db->prepare("SELECT * FROM posts ORDER BY data_publicacao DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

// Function to search blog posts
function searchBlogPosts($db, $keyword) {
    $stmt = $db->prepare("SELECT * FROM posts WHERE titulo LIKE :keyword OR conteudo LIKE :keyword ORDER BY data_publicacao DESC");
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->execute();
    return $stmt->fetchAll();
}

// Fetch posts or search results
if (isset($_GET['search'])) {
    $posts = searchBlogPosts($db, $_GET['search']);
} else {
    $posts = getBlogPosts($db);
}
?>
<title>Noticias</title>

<!-- Conteúdo específico da página Noticias-->
<div class="animcontainer">
    <section class="py-5 text-center container">
        <div class="row py-lg-5 text-light">
        <div class="col-lg-6 col-md-8 mx-auto" data-aos="fade-down">
            <h1 class="fw-light">Blog</h1>
            <p class="lead"> 
                Queres saber como começou e como continua este projeto? <br>
                Esta página contempla o progresso do projeto Manage Me, desde o seu insight à
                sua implementação técnica, no seu blog oficial.
            </p>
        </div>
        </div>
    </section>
</div>

<?php if (isset($_SESSION['username'])): ?>
<!-- Page content-->
<div class="container mt-4">

    <div class="container mt-4">
        <!-- Search Form -->
        <form action="noticias.php" method="GET" class="mb-4">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search posts...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <!-- Blog Posts Display -->
        <?php foreach ($posts as $post): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <?= htmlspecialchars($post['titulo']) ?>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">By <?= htmlspecialchars($post['autor']) ?> on <?= $post['data_publicacao'] ?></h6>
                    <p class="card-text"><?= nl2br(htmlspecialchars($post['conteudo'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?php endif; ?>

<?php
include('inc/footer.php'); 
?>