<main class="container">

    <h2><?= ($args['article']['title'] ?? 'Article non trouvé') ?></h2>
    <p class="publish-date">Publié le : <?= isset($args['article']['published_at']) ? date('d/m/Y à H:i', strtotime($args['article']['published_at'])) : '' ?></p>

    <article class="article-full">
        <?= nl2br(($args['article']['content'] ?? 'Cet article n\'existe pas.')) ?>
    </article>

    <section class="comments-section">
        <h2>Commentaires</h2>
        <div class="comment-form">
            <?php if (isset($_SESSION['user'])): ?>
                <?php if (!isset($_SESSION['user']['is_banned']) || $_SESSION['user']['is_banned'] == false): ?>
                    <textarea name="comment" id="comment" placeholder="Laisser un commentaire"></textarea>
                    <button onclick="window.location.href='/ctrl/comment-add-display.php?article_id=<?= $args['article']['id'] ?>'">Poster le commentaire</button>
                <?php else: ?>
                    <p>Vous ne pouvez pas laisser de commentaire car votre compte est banni.</p>
                <?php endif; ?>
            <?php else: ?>
                <p>Vous devez être connecté pour laisser un commentaire. <a href="/ctrl/login-display.php">Se connecter</a></p>
            <?php endif; ?>
        </div>
        <?php if (!empty($args['listComment'])): ?>
            <ul class="comments-list">
                <?php foreach ($args['listComment'] as $comment): ?>
                    <li class="comment-item">
                        <p class="comment-author">L'utilisateur <strong><?= ($comment['username']) ?></strong> a commenté le <?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?> : </p>
                        <p><?= nl2br(($comment['content'])) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Soyez le premier à commenter cet article !</p>
        <?php endif; ?>

    </section>
</main>