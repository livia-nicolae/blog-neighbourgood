USE `600-blog-LNI`
;

START TRANSACTION
;

INSERT INTO category (id, name, display_rank) VALUES 
(110, 'Actualités du Quartier', 1)
,(120, 'Vie Pratique', 2)
,(130, 'Initiatives Locales', 3)
,(140, 'Culture & Loisirs', 1)
,(150, 'Paroles de Voisins', 2)
;

INSERT INTO account (id, username, email, password, hashed_password, role, created_at, is_banned)
VALUES
(210, 'marseillais13', 'contact@neighbourgood.fr', 'test', '$2y$10$abcdefghijklmnopqrstuvwxyz0123456789abcdefghijklmn', 'admin', '2025-05-05 11:15:00', FALSE)
,(220, 'habitant', 'habitant@quartier.com', 'test', '$2y$10$zyxwvutsrqponmlkjihgfedcba9876543210zyxwvutsrqponm', 'registered', '2025-05-05 11:20:00', FALSE)
,(230, 'curieux', 'curieux@ailleurs.net', 'test', '$2y$10$lkjhgfdsaqwertyuiopzxcvbnm1234567890lkjhgfdsaqwerty', 'registered', '2025-05-05 11:25:00', FALSE)
,(240, 'voisin_sympa', 'sympa@voisinage.org', 'test', '$2y$10$poiuytrewqasdfghjklmnbvcxz0987654321poiuytrewqasdf', 'registered', '2025-05-05 11:30:00', FALSE)
,(250, 'modo_du_coin', 'modo@neighbourgood.fr', 'test', '$2y$10$mnbvcxzlkjhgfdsaqwertyuiop0123456789mnbvcxzlkjhgf', 'admin', '2025-05-05 11:35:00', FALSE)
;


INSERT INTO article (id, title, content, account_id, category_id, is_published)
VALUES
(   310
    ,'Découvrez les Charmes Cachés du Panier'
    ,'Le Panier, plus vieux quartier de Marseille, est un dédale de ruelles colorées et de places pittoresques qui respirent l\'histoire. Flâner dans ses rues étroites, c\'est remonter le temps, découvrir des artisans locaux et admirer le linge coloré séchant aux fenêtres. Ne manquez pas la Vieille Charité, un joyau architectural abritant des musées et des expositions. Imprégnez-vous de l\'atmosphère unique de ce quartier vibrant, où l\'art de rue côtoie les traditions provençales. Prenez le temps de savourer une socca dans un des nombreux petits restaurants et laissez-vous conter l\'âme de Marseille au fil de vos pas. Le Panier est un incontournable pour qui veut comprendre l\'essence de cette ville fascinante, un mélange de cultures et d\'histoires qui se dévoile à chaque coin de rue.'
    ,220
    ,110
    ,TRUE
),
(   320
    ,'Conseils Pratiques pour une Visite Réussie des Calanques'
    ,'Les Calanques de Marseille, un écrin de nature sauvage entre terre et mer, attirent chaque année de nombreux visiteurs. Pour profiter pleinement de leur beauté, quelques conseils pratiques s\'imposent. Privilégiez les randonnées tôt le matin ou en fin de journée, surtout en été, pour éviter la chaleur et la foule. Prévoyez de bonnes chaussures de marche, de l\'eau en quantité suffisante et une protection solaire. Certaines calanques sont accessibles en bateau, offrant une perspective différente et rafraîchissante. N\'oubliez pas de respecter l\'environnement fragile de ce site protégé : ne laissez aucun déchet et suivez les sentiers balisés. La beauté des Calanques se mérite, mais le spectacle en vaut largement la peine.'
    ,230
    ,120
    ,TRUE
),
(   330
    ,'L\'Épopée de la Sardine : Plus Qu\'un Simple Poisson à Marseille'
    ,'À Marseille, la sardine est bien plus qu\'un poisson : c\'est un symbole, une partie intégrante de l\'identité locale. De la pêche artisanale aux conserveries traditionnelles, elle a marqué l\'histoire économique et culturelle de la ville. Les fameuses "sardinades" sont des moments de convivialité où l\'on déguste ce poisson grillé entre amis ou en famille. Découvrez les différentes façons de la préparer, des recettes simples aux plats plus élaborés. Apprenez l\'importance de la pêche durable pour préserver cette ressource emblématique. La sardine raconte une histoire de labeur, de partage et de saveurs authentiques, un héritage précieux à savourer et à transmettre aux générations futures.'
    ,220
    ,130
    ,TRUE
),
(   340
    ,'Les Initiatives Citoyennes Qui Font Vivre Nos Quartiers'
    ,'Marseille bouillonne d\'initiatives citoyennes qui contribuent à améliorer la qualité de vie et le lien social dans nos quartiers. Des jardins partagés auxRepair Cafés, en passant par les événements culturels de proximité, les habitants se mobilisent pour créer des espaces de rencontre et d\'échange. Découvrez ces projets inspirants, portés par des bénévoles passionnés qui œuvrent au quotidien pour un "NeighbourGood" plus solidaire et plus agréable à vivre. Rencontrez ces acteurs du changement, apprenez comment vous pouvez vous impliquer et contribuez à faire de votre quartier un lieu où il fait bon vivre ensemble. Ces initiatives sont le cœur battant de notre communauté.'
    ,240
    ,140
    ,TRUE
),
(   350
    ,'Balade Culturelle au Cœur de la Canebière et de ses Secrets'
    ,'La Canebière, artère emblématique de Marseille, recèle bien des secrets derrière sa façade animée. Au-delà des boutiques et des grands hôtels, prenez le temps d\'observer les détails architecturaux, les plaques commémoratives et les vestiges d\'un passé riche en histoires. Découvrez l\'histoire du Vieux-Port, point de départ de tant d\'aventures maritimes. Poussez les portes des églises et des musées qui jalonnent cette avenue mythique. Laissez-vous conter les anecdotes et les légendes qui ont façonné son identité. Une balade sur la Canebière est un voyage dans le temps, une immersion au cœur de l\'âme marseillaise, entre grandeur passée et dynamisme contemporain.'
    ,250
    ,150
    ,TRUE
)
;

INSERT INTO comment (id, article_id, account_id, content, created_at, is_approved) VALUES
(411, 310, 210, 'J\'ai trouvé cet article très intéressant, merci pour le partage !', '2025-05-05 11:50:00', TRUE)
,(412, 310, 230, 'Oui, vraiment instructif. J\'aimerais en savoir plus sur ce sujet.', '2025-05-05 11:52:00', TRUE)

,(413, 320, 220, 'Super article ! Ça m\'a donné envie de découvrir cet endroit.', '2025-05-05 11:54:00', TRUE)
,(414, 320, 250, 'Merci pour les conseils pratiques, ils seront très utiles.', '2025-05-05 11:56:00', TRUE)


,(415, 330, 210, 'Un regard fascinant sur l\'histoire locale. J\'apprécie beaucoup ce genre d\'articles.', '2025-05-05 11:58:00', TRUE)
,(416, 330, 240, 'C\'est important de se souvenir de notre patrimoine. Merci !', '2025-05-05 12:00:00', TRUE)


,(417, 340, 230, 'Ces initiatives sont vraiment inspirantes. Comment peut-on s\'impliquer ?', '2025-05-05 12:02:00', TRUE)
,(418, 340, 220, 'C\'est super de mettre en avant ces actions positives dans notre quartier.', '2025-05-05 12:04:00', TRUE)

,(419, 350, 250, 'J\'adore explorer la Canebière, il y a toujours quelque chose de nouveau à découvrir.', '2025-05-05 12:06:00', TRUE)
,(420, 350, 210, 'Merci pour cette perspective intéressante sur cette avenue emblématique.', '2025-05-05 12:08:00', TRUE)
;

COMMIT
;