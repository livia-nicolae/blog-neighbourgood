<main class="container">

    <h1><?= ($args['article']['title'] ?? 'Article non trouvé') ?></h1>
    <p class="publish-date">Publié le : <?= isset($args['article']['published_at']) ? date('d/m/Y à H:i', strtotime($args['article']['published_at'])) : '' ?></p>

    <article class="article-full">
        <?= nl2br(($args['article']['content'] ?? 'Cet article n\'existe pas.')) ?>
    </article>

    <section class="comments-section">
        <h2>Commentaires</h2>

        <?php if (!empty($args['listComment'])): ?>
            <ul class="comments-list">
                <?php foreach ($args['listComment'] as $comment): ?>
                    <li class="comment-item">
                        <p class="comment-author">Par Utilisateur <?= ($comment['username']) ?> le <?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?></p>
                        <p><?= nl2br(($comment['content'])) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Soyez le premier à commenter cet article !</p>
        <?php endif; ?>
        <div class="comment-form">
            <a href="/ctrl/comment-add-display.php?article_id=<?= $args['article']['id'] ?>">Laisser un commentaire</a>
        </div>
           
    </section>
</main>



