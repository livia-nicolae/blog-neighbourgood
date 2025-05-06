<main>
    <section  class="articles">
    <h2>Derniers Articles</h2>
        <?php foreach ($args['listArticle'] as $article) { ?>
            <article class="article-item">
                <h3><a href="/ctrl/article-show.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a></h3>
                <p class="publish-date">Publié le : <?= date('d/m/Y à H:i', strtotime($article['published_at'])) ?></p>
                <p><?= substr(htmlspecialchars($article['content']), 0, 200) ?>...</p>
                <p class="read-more"><a href="/ctrl/article-show.php?id=<?= $article['id'] ?>">Lire la suite</a></p>
            </article>
        <?php } ?>
    </section>

    <aside class="sidebar">
        <h2>Catégories</h2>
        <ul>
            <li><a href="/category/actualites-du-quartier">Actualités du Quartier</a></li>
            <li><a href="/category/vie-pratique">Vie Pratique</a></li>
            <li><a href="/category/initiatives-locales">Initiatives Locales</a></li>
            <li><a href="/category/culture-loisirs">Culture & Loisirs</a></li>
            <li><a href="/category/paroles-de-voisins">Paroles de Voisins</a></li>
        </ul>

</main>