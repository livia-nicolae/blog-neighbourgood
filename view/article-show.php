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
                        <p class="comment-author">Par Utilisateur <?= ($comment['account_id']) ?> le <?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?></p>
                        <p><?= nl2br(($comment['content'])) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Soyez le premier à commenter cet article !</p>
        <?php endif; ?>

        <div class="comment-form">
            <h3>Laisser un commentaire</h3>
            <?php if (isset($_SESSION['user'])): ?>
                <form action="/comment/add/<?= $args['article']['id'] ?>" method="post">
                    <textarea name="content" rows="5" placeholder="Votre commentaire..."></textarea><br>
                    <button type="submit">Poster le commentaire</button>
                </form>
            <?php else: ?>
                <p><a href="/login">Connectez-vous</a> pour laisser un commentaire.</p>
            <?php endif; ?>
        </div>
    </section>
</main>