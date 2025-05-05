-- Requête pour afficher un seul article
SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published
FROM article
WHERE article.id=:id
;

-- Requête pour afficher toutes les articles
SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published
FROM article
;

-- Requête pour afficher tous les articles écrits par un utilisateur 
SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published
FROM article
JOIN account ON article.account_id = account.id
WHERE account_id = :id
;

-- Requête pour afficher toutes les articles d'une catégorie selectionnée
SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published
FROM article
JOIN category ON article.category_id = category.id
WHERE category.id = :id
;

-- Requête pour afficher un commentaire
SELECT comment.id, comment.article_id, comment.account_id, comment.content, comment.created_at, comment.updated_at, comment.is_approved FROM comment
WHERE comment.id = :id
;

-- Requête pour afficher toutes les commentaires d'un article
SELECT comment.id, comment.article_id, comment.account_id, comment.content, comment.created_at, comment.updated_at, comment.is_approved FROM comment
JOIN article ON comment.article_id = article.id
WHERE article.id = :id
;

-- Requête pour afficher toutes les commentaires laissés par un utilisateur
SELECT comment.id, comment.article_id, comment.account_id, comment.content, comment.created_at, comment.updated_at, comment.is_approved FROM comment
JOIN account ON comment.account_id = account.id
WHERE account.id = :id
;

-- Requête pour afficher tous les utilisateurs
SELECT account.id, account.username, account.email, account.role, account.created_at, account.updated_at, account.is_banned 
FROM account
;

-- Requête pour afficher les détails d'un utilisateur 
SELECT account.id, account.username, account.email, account.role, account.created_at, account.updated_at, account.is_banned 
FROM account
WHERE account.id = :id
;

-- Requête pour afficher toutes les catégories
SELECT category.id, category.name
FROM category
;

-- Requête pour afficher une catégorie
SELECT category.id, category.name
FROM category
WHERE category.id = :id
;
