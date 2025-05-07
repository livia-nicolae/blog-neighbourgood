<main>
    <section>
        <h2>Mes informations de compte</h2>
        <dl>
            <dt>Username: </dt>
            <dd><?= $args['username']; ?></dd>

            <dt>Email: </dt>
            <dd><?= $args['email']; ?></dd>

            <dt>Rôle: </dt>
            <dd><?= $args['role'];; ?></dd>

            <?php if ($args['is_banned'] === true): ?>
                <div class="banned-message">
                    <p style="color: red; font-weight: bold;">Votre compte est actuellement banni. </p>
                </div>
            <?php else: ?>
                <div class="active-message">
                    <p>Votre compte est actif depuis le <?= $args['created_at']; ?> .</p>
                </div>
            <?php endif; ?>
        </dl>
    </section>
    <section>
        <h2>Mes articles</h2>
        <?php if (!empty($args['articlesByAccount'])): ?>
            <ul class="article-list">
                <?php foreach ($args['articlesByAccount'] as $article): ?>
                    <li class="article-item">
                        <h3><a href="/article/<?= $article['id'] ?>"><?= $article['title'] ?></a></h3>
                        <p class="publish-date">Publié le : <?= date('d/m/Y à H:i', strtotime($article['published_at'])) ?></p>
                        <p><?= substr(nl2br($article['content']), 0, 200) ?>...</p>
                        <p><a href="/article/<?= $article['id'] ?>">Lire la suite</a></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Cet utilisateur n'a pas encore publié d'articles.</p>
        <?php endif; ?>
    </section>
    <section>
        <h2>Mes Commentaires</h2>

        <?php if (!empty($args['commentsByAccount'])): ?>
            <ul class="comment-list">
                <?php foreach ($args['commentsByAccount'] as $comment): ?>
                    <li class="comment-item">
                        <p class="comment-date">Le <?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?></p>
                        <p>Sur l'article: <a href="/article/<?= $comment['article_title'] ?>"><?= $comment['article_id'] ?></a></p>
                        <p class="comment-content"><?= nl2br($comment['content']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Vous n'avez pas encore publié de commentaires.</p>
        <?php endif; ?>
    </section>
</main>