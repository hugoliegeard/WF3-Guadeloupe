# Pour faire un commentaire on utilise le '#'

# On crée la table "employes" uniquement 
# si elle n'existe pas déjà.
CREATE TABLE IF NOT EXISTS `employes` (
	# Ici je vais préciser les colonnes de ma table :
    # 1. Nom de la colonne
    # 2. Le Type de la colonne
    # 3. DEFAULT NULL / NOT NULL
    # 4. Si AUTO_INCREMENT ecrire AUTO_INCREMENT
	`id_employes` int(3) NOT NULL AUTO_INCREMENT,
    `prenom` varchar(20) NOT NULL,
    `nom` varchar(20) NOT NULL,
    `sexe` enum('h', 'f') NOT NULL,
    `service` varchar(30) DEFAULT NULL,
    `date_embauche` date DEFAULT NULL,
    `salaire` float DEFAULT NULL,
    PRIMARY KEY (`id_employes`)
    
    # InnoDB permet de bénéficier des relations avec les FK
    # MyISAM n'inclut pas la gestion des FK.
    # Chercher sur Google MyISAM vs InnoDB
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;






