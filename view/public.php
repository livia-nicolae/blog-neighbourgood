<main>

    <section class="articles">
        <h2>Derniers Articles</h2>
        <?php foreach ($args['listArticle'] as $article) { ?>
            <article class="article-item">
                <h3><a href="/ctrl/article-show.php?id=<?= $article['id'] ?>"><?= ($article['title']) ?></a></h3>
                <p class="publish-date">Publié le : <?= date('d/m/Y à H:i', strtotime($article['published_at'])) ?></p>
                <p><?= substr(($article['content']), 0, 200) ?>...</p>
                <p class="read-more"><a href="/ctrl/article-show.php?id=<?= $article['id'] ?>">Lire la suite</a></p>
            </article>
        <?php } ?>
    </section>

    <aside class="sidebar">
        <h2>Catégories</h2>
        <ul>
            <?php foreach ($args['listCategory'] as $category): ?>
                <li>
                    <a href="/ctrl/category.php?id=<?= $category['id'] ?>">
                        <?= ($category['name']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>
</main>