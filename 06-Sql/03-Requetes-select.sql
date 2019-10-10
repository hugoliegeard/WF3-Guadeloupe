# Récupère les prenoms et noms de tous les employes
# 1. SELECT pour effectuer une requète de SELECTion
# 2. On précise les colonnes qu'on souhaite récupérer
# 3. FROM pour indiquer la table concernée.
# SELECT prenom, nom FROM employes

# Afficher les services occupés dans l'entreprise
# On remarque la présence de doublon
# SELECT service FROM employes ;

# Afficher les services occupés dans l'entreprise (sans doublons)
# Le mot clé 'DISTINCT' permet d'éviter les doublons
# SELECT DISTINCT service FROM employes ;

# Afficher toutes les données de la table employés
 # SELECT prenom, nom, sexe, service, date_embauche, salaire FROM employes
# '*' permet de cibler toutes les colonnes.
# SELECT * FROM employes

# Récupérer le prénom et le nom des employés du service 'commercial'
SELECT prenom, nom FROM employes WHERE service = 'commercial' ;

# Récupérer les employés ayant été recruté entre Janvier et Mars 2019
SELECT prenom, nom FROM employes
	WHERE date_embauche BETWEEN '2019-01-01' AND '2019-03-01' ;

# Récupérer les employés ayant un salaire compris entre 2000 et 3000 neuro.
SELECT prenom, nom, salaire FROM employes
	WHERE salaire BETWEEN '2000' AND '3000' ;
    
# Connaitre la date du jour
SELECT CURDATE() ;

# Récupérer les employés ayant été recruté entre Mars 2019 et Aujourd'hui
SELECT prenom, nom, date_embauche FROM employes
	WHERE date_embauche BETWEEN '2019-03-01' AND CURDATE() ;
    
# Récupérer tous les employés ayant un prénom commençant par la lettre 'L'
SELECT prenom FROM employes WHERE prenom LIKE 'l%' ;

# Récupérer tous les employés ayant un prénom se terminant par la lettre 'A'
SELECT prenom FROM employes WHERE prenom LIKE '%a' ;

# Récupérer tous les employés ayant un prénom contenant la lettre 'I'
SELECT prenom FROM employes WHERE prenom LIKE '%i%' ;

# Afficher tous les employés sauf ceux du service production
# On utilise l'opérateur !=
SELECT prenom, nom, service FROM employes 
	WHERE service != 'production' ;

# Afficher tous les employés gagnant un salaire supérieur à 3000 €
SELECT prenom, nom, service, salaire FROM employes
	WHERE salaire > 3000 ;
    
# Afficher les employés par ordre alphabétique de leur prénom
# On utilise le mot clé ORDER BY suivi de ASC pour ascendant et DESC pour descendant
# SELECT prenom, nom FROM employes ORDER BY prenom ;
SELECT prenom, nom FROM employes ORDER BY prenom ASC; # ASCENDANT
SELECT prenom, nom FROM employes ORDER BY prenom DESC; # DESCENDANT

# Quels sont les 3 salariés ayant le meilleur salaire ?
# Grâce à LIMIT, je peux limiter les résultats et introduire de la pagination.
# LIMIT (POSITION DE DEPART) , (NB DE RESULTATS)
SELECT prenom, nom, service, salaire FROM employes
	ORDER BY salaire DESC LIMIT 0,3 ; # Je pars de 0 et je veux 3 résultats
    
SELECT prenom, nom, service, salaire FROM employes
	ORDER BY salaire DESC LIMIT 3,3 ; # Je pars du 3ème et je veux 3 résultats

SELECT prenom, nom, service, salaire FROM employes
	ORDER BY salaire DESC LIMIT 6,3 ; # Je pars du 6ème et je veux 3 résultats
    
# Afficher les employés avec leur salaire annuel
SELECT nom, prenom, salaire*12 FROM employes;

# Le mot clé 'AS' permet de nommer une colonne (Donner un Alias).
SELECT nom, prenom, salaire*12 AS salaire_annuel FROM employes;

# Connaitre le montant de la charge salariale ?
SELECT SUM( salaire*12 ) as masse_salariale_annuelle FROM employes ;

# Le salaire moyen ?
SELECT AVG( salaire ) as moyenne_salaire FROM employes ;

# Résultat Arrondi
SELECT ROUND( AVG( salaire ) ) as moyenne_salaire FROM employes ;
SELECT ROUND( AVG( salaire ), 2 ) as moyenne_salaire FROM employes ; # 2 chiffres après la virgule

# Nombre d'hommes et de femmes de l'entreprise
SELECT COUNT(*) AS nb_homme FROM employes WHERE sexe = 'h';
SELECT COUNT(*) AS nb_femme FROM employes WHERE sexe = 'f';

# Comment trouver le salaire le plus faible de l'entreprise ?
SELECT prenom, service, salaire FROM employes ORDER BY salaire LIMIT 0,1 ;
SELECT MIN(salaire) FROM employes ; # Ici, nous ne pouvons pas connaitre l'identité

# Il faudrait utiliser une requete imbriqué
# Quel est le salaire minimum et maximum avec MAX ?
# A qui il appartient ?
SELECT prenom, salaire, service FROM employes
	WHERE salaire = ( SELECT MIN( salaire ) FROM employes ) ;
    
# Récupérer les employés sur services 'compatibilité' et 'informatique' ?
# IN : Qui sont dans ...
SELECT prenom, service FROM employes
	WHERE service IN('comptabilite', 'informatique') ;

# Tous les services, SAUF comptabilite, informatique et production
# NOT IN : Qui ne sont pas dans ...
SELECT prenom, service FROM employes
	WHERE service NOT IN('comptabilite', 'informatique', 'production') ;
    
# Récupérer les employés du service commercial qui gagnent un salaire supérieur ou égale a 2000€
# Ici nous avons deux conditions
# 1. Appartenir au service commercial
# 2. Avoir un salaire supérieur ou égal a 2000€
SELECT prenom, nom, salaire, service FROM employes
	WHERE service = 'commercial'
    AND salaire >= 2000 ;

# Récupérer les employés du service commercial qui gagnent un salaire de 2700€ ou 3200€
# Ici nous avons trois conditions
# 1. Appartenir au service commercial
# 2. Avoir un salaire de 2700€
# 3. Ou Avoir un salaire de 3200€
SELECT prenom, nom, service, salaire FROM employes
	WHERE service = 'commercial'
    AND salaire = 2700
    OR salaire = 3200 ;
    
SELECT prenom, nom, service, salaire FROM employes
	WHERE service = 'commercial'
    AND ( salaire = 2700 OR salaire = 3200 ) ;

# Connaitre le nombre d'employés par service ?
SELECT service, COUNT(*) AS nb_employes FROM employes GROUP BY service ;

# Les services ayant plus de 2 employés ?
# Le HAVING permet d'imposer une condition au GROUP BY
SELECT service, COUNT(*) AS nb_employes FROM employes 
	GROUP BY service HAVING COUNT(*) > 2 ;

# Afficher pour chaque service l'employé ayant le meilleur salaire ?
# Afficher pour chaque service l'employé ayant le plus d'ancienneté ? 



