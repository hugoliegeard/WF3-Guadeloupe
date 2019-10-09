# Récupère les prenoms et noms de tous les employes
# 1. SELECT pour effectuer une requète de SELECTion
# 2. On précise les colonnes qu'on souhaite récupérer
# 3. FROM pour indiquer la table concernée.
# SELECT prenom, nom FROM employes

# Afficher les services occupés dans l'entreprise
# On remarque la présence de doublon
SELECT service FROM employes ;

# Afficher les services occupés dans l'entreprise (sans doublons)
# Le mot clé 'DISTINCT' permet d'éviter les doublons
SELECT DISTINCT service FROM employes ;

# Afficher toutes les données de la table employés
# SELECT prenom, nom, sexe, service, date_embauche, salaire FROM employes
# '*' permet de cibler toutes les colonnes.
SELECT * FROM employes
    
