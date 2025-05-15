-- Supprime la base de données si elle existe déjà
DROP DATABASE IF EXISTS `600-blog-LNI`
;

-- Crée la base de données
CREATE DATABASE IF NOT EXISTS `600-blog-LNI`
;

-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent
USE `600-blog-LNI`
;

-- ------
-- TABLES
-- ------  

CREATE TABLE category (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Nom catégorie'
    ,display_rank INT NOT NULL COMMENT 'Ordre'
)
;

CREATE TABLE account (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,username VARCHAR(50) UNIQUE NOT NULL COMMENT 'Nom utilisateur'
    ,email VARCHAR(100) UNIQUE NOT NULL COMMENT 'Email'
    ,password VARCHAR(255) NOT NULL COMMENT 'Mod de passe'
    ,hashed_password varchar(255) NOT NULL COMMENT 'Mod de passe haché'
    ,role ENUM('registered', 'admin') DEFAULT 'registered' NOT NULL
    ,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,is_banned BOOLEAN DEFAULT FALSE
)
;

CREATE TABLE article (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,title VARCHAR(255) NOT NULL COMMENT 'Titre'
    ,content TEXT NOT NULL COMMENT 'Contenu article'
    ,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,account_id INT UNSIGNED NOT NULL COMMENT 'ID Auteur'
    ,category_id INT UNSIGNED DEFAULT NULL COMMENT 'ID Catégorie'
    ,is_published BOOLEAN DEFAULT FALSE
    ,FOREIGN KEY (account_id) REFERENCES account(id)
    ,FOREIGN KEY (category_id) REFERENCES category(id)
)
;

CREATE TABLE comment (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,article_id INT UNSIGNED NOT NULL 
    ,account_id INT UNSIGNED NOT NULL 
    ,content TEXT NOT NULL
    ,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,is_approved BOOLEAN DEFAULT TRUE
)
;

-- -----------
-- CONSTRAINTS
-- -----------

ALTER TABLE category 
    ADD CONSTRAINT u_category_name UNIQUE(name)
    ;

ALTER TABLE account
    ADD CONSTRAINT u_account_username UNIQUE(username)
    ,ADD CONSTRAINT u_account_email UNIQUE(email)
    ;

ALTER TABLE article
    ADD CONSTRAINT u_article_title UNIQUE(title)
    ,ADD CONSTRAINT u_article_content UNIQUE(content)
    ;