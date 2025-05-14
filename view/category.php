
<main>
    <div class="container">
        <h2>Articles de la catégorie : <?= ($args['category']['name'] ?? 'Inconnue') ?></h2>

        <?php if (!empty($args['listArticleFromCategory'])): ?>
            <ul class="article-list">
                <?php foreach ($args['listArticleFromCategory'] as $article): ?>
                    <li class="article-item">
                        <h3><a href="/article/<?= $article['id'] ?>"><?= ($article['title']) ?></a></h3>
                        <p class="publish-date">Publié le : <?= isset($article['published_at']) ? date('d/m/Y à H:i', strtotime($article['published_at'])) : 'Non défini' ?></p>
                        <div class="article-content">
                            <?= substr(nl2br(($article['content'])), 0, 250) ?>...
                        </div>
                        <p><a href="/article/<?= $article['id'] ?>" class="read-more-link">Lire la suite</a></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="no-articles">Il n'y a pas encore d'articles dans cette catégorie.</p>
        <?php endif; ?>
    </div>
</main>