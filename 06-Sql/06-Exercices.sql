# Afficher le service de l'employé 5.
SELECT service FROM employes WHERE id_employes = 5 ;

# Afficher la date d'embauche de : Melissa.
SELECT date_embauche FROM employes
	WHERE prenom = 'Melissa' ;

# Afficher le nombre de commerciaux.
SELECT COUNT(*) AS nb_commerciaux FROM employes 
	WHERE service = 'commercial' ;

# Afficher le coût des commerciaux sur 1 année.
SELECT SUM( salaire * 12 ) AS cout_commerciaux 
	FROM employes WHERE service = 'commercial' ;

# Afficher le salaire moyen par service.
SELECT service, ROUND( AVG( salaire ) ) AS moyenne_salaire
	FROM employes
		GROUP BY service ;

# Afficher le nombre de recrutements sur l'année 2019.
SELECT COUNT(*) AS 'nb_recrutement' FROM employes
	WHERE date_embauche 
		BETWEEN '2019-01-01' AND '2019-12-31' ;
        
SELECT COUNT(*) AS 'nb_recrutement' FROM employes
	WHERE date_embauche LIKE '2019%';

# Augmenter le salaire pour chaque employé de 100€.
UPDATE employes SET salaire = salaire + 100 ;

# Afficher les informations de l'employé du service commercial gagnant le salaire le plus élevé
SELECT prenom, nom, sexe, date_embauche, salaire, service 
	FROM employes
		WHERE service = 'commercial'
			AND salaire = ( SELECT MAX( salaire ) FROM employes
								WHERE service = 'commercial' ) ;

# Afficher l'employé ayant été embauché en dernier.
SELECT * FROM employes
	WHERE date_embauche = ( SELECT MAX(date_embauche) FROM employes );