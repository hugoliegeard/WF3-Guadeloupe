# --------------------- CATEGORIE --------------------- #

CREATE TABLE `categorie` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categorie` (`nom`) 
    VALUES ('Politique'), ('Economie'), ('Sports'), ('Culture');

# --------------------- AUTEUR --------------------- #

CREATE TABLE `auteur` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `prenom` varchar(80) NOT NULL,
    `nom` varchar(80) NOT NULL,
    `email` varchar(80) NOT NULL,
    `password` varchar(256) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `auteur` (`prenom`, `nom`, `email`, `password`) 
    VALUES ('Hugo', 'LIEGEARD', 'hugo@actu.news', 'actunews');

# --------------------- ARTICLE --------------------- #

CREATE TABLE `article` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `titre` varchar(256) NOT NULL,
    `contenu` text NOT NULL,
    `image` varchar(256) NOT NULL,
    `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `categorie_id` int(11) NOT NULL,
    `auteur_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `article` ADD FOREIGN KEY (`categorie_id`)
    REFERENCES `categorie` (`id`);
    
ALTER TABLE `article` ADD FOREIGN KEY (`auteur_id`)
    REFERENCES `auteur` (`id`);    
    