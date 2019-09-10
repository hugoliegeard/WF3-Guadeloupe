/* --------------------------------------
            LES CONDITIONS 🌺
-------------------------------------- */

// var majoriteLegaleFr = 18;

// if( 19 >= majoriteLegaleFr ) {
//     /**
//      * Comme 19 est bien supérieur à 18 (majoriteLegaleFr) ;
//      * alors les instructions de ma conditions sont executées.
//      * Ce qu'il y a entre les accolades.
//      */
//     alert('Bienvenue !');
// }

// if( 14 >= majoriteLegaleFr ) {
//     /**
//      * Comme 14 est bien inférieur à 18 (majoriteLegaleFr) ;
//      * alors les instructions ne sont pas executées.
//      */
//     alert('Bienvenue !');
// } else if ( 18 == majoriteLegaleFr ) {  // LE ELSE IF N'EST PAS OBLIGATOIRE
//     /**
//      * Comme 18 est égale à la majoriteLegaleFr ;
//      * la condition s'execute !
//      */
//     alert("C'est un peu juste non ?!");
// } else { // LE ELSE N'EST PAS OBLIGATOIRE
//     /**
//      * Si aucune des conditions si dessus n'ont été validés ;
//      * alors je rentre dans le "else".
//      */
//     alert("Va voir chez Google si...");

// }

/* -----------------------------------------------------------------------------
    EXERCICE
    Créer une fonction permettant de vérifier l'age d'un visiteur (prompt).
    S'il a la majorité légale, alors je lui souhaite la bienvenue, 
    sinon, je fais une redirection sur Google après lui avoir signalé le soucis.
------------------------------------------------------------------------------ */

// -- 1. Créer une fonction permettant de vérifier la majorité d'un utilisateur



// -- 2. Je demande à l'utilisateur son age.
const ageSaisieParMonUtilisateur = parseInt( 
    prompt("Bonjour, Quel age avez-vous ?","<Saisissez votre age>") 
);

// -- 3. Vérification de son age (Condition)
if( monUtilisateurEstMajeur( ageSaisieParMonUtilisateur ) ) {

    alert("Bienvenue sur mon site réservé aux majeurs !");

} else {

    // -- 4. Redirection en cas d'echec
    alert('Vous devez être majeur pour accéder à ce site.');
    document.location.href = "https://google.fr";

}

/* -------------------------------------------------------------\
|               LES OPERATEURS DE COMPARAISON                   |
|   ~   ~   ~   ~   ~   ~   ~   ~   ~   ~   ~   ~   ~   ~   ~   |
|                                                               |
|   L'Opérateur de comparaison " == " signifie : Egal à.        |
|   Il permet de vérifier que 2 variables sont identiques.      |
|                                                               |
|   L'Opérateur de comparaison " === " signifie : Strictement   |
|   égal à. Il va comparer la valeur, mais aussi le type !      |
|                                                               |
|   if( 14 == "14" ) {} = true                                  |
|   if( 14 === '14' ) {} = false                                |
|   if( 14 === 14 ) {} = true                                   |
|                                                               |
|   L'Opérateur " != " : Différent de.                          |
|   L'Opérateur " !== " : Strictement Différent de.             |
|                                                               |
|   if( 12 != 14 ) {} = true                                    |
|   if( 12 !== '14' ) {} = true                                 |
|   if( 12 !== 12 ) {} = false                                  |
|   if( 12 !== '12' ) {} = true ; Ici, 12 est bien différent    |
|   de 12 à cause du type.                                      |
|                                                               |
\ ------------------------------------------------------------ */

/* ----------------------------------------------------------------------
    EXERCICE : http://sharemycode.fr/consigne
J'arrive sur un Espace Sécurisé au moyen d'un email et d'un mot de passe.
Je dois saisir mon email et mon mot de passe afin d'être authentifié sur le site.
En cas d'échec une "alert" m'informe du problème.
Si tous se passe bien, un message de bienvenue m'accueil.
----------------------------------------------------------------------- */

// // -- BASE DE DONNEES
const email = "wf3@hl-media.fr";
const mdp = "wf3";

// -- 1. Demander à l'utilisateur son email / mdp
const emailPrompt = prompt("Quel est votre e-mail ?", "<Saisissez votre Email>");
const mdpPrompt = prompt("Quel est votre mdp ?", "<Saisissez votre Mot de Passe>");

// -- 2. Je vérifie si l'email / mdp saisie par l'utilisateur correspondent avec ceux dans la BDD.

// If imbriqué...
if ( email === emailPrompt ) {
    if(mdp === mdpPrompt) {
        alert("Bienvenue " + emailPrompt + " !");
    }
}

// Une seule condition
if ( email === emailPrompt && mdp === mdpPrompt ) {
    // -- 3. Tous est ok, l'utilisateur est authentifié
    alert("Bienvenue " + emailPrompt + " !");
} else {
    // -- 4. Erreur au niveau de l'authentification
    alert("ATTENTION, email / mdp incorrect.");
}

// -- Avec les fonctions
function connexion( emailUser, mdpUser ) {
    if ( email === emailUser && mdp === mdpUser ) {
        return true;
    } else {
        return false;
    }
}

if ( connexion( emailPrompt, mdpPrompt ) ) {
    alert("Bienvenue " + emailPrompt + " !");
} else {
    alert("ATTENTION, email / mdp incorrect.");
}


         /* -------------------------------------------|   |------------- *\
        /                                              |   |                \
       /           ~         LES OPERATEURS LOGIQUES          ~              \
      /_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _\
        |                                                                   |
        |   # L'Opérateur ET : &&. Si la combinaison email et emailUser     |
        |   correspond, ET la combinaison mdp et mdpUser correspond.        |
        |                                                                   |
        |   --> Dans cette condition, les 2 doivent OBLIGATOIREMENT         |
        |   correspondre pour être validée.                                 |   
        |   Ex. if(emailUser === email && mdpUser === mdp) { ... }          |
        |                                                                   |
        |   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -   |
        |                                                                   |
        |   # L'Opérateur OU : ||. Si la combinaison email et emailUser     |
        |   correspond, ET / OU la combinaison mdp et mdpUser correspond.   |
        |                                                                   |
        |   --> Dans cette condition, au moins l'une des deux doit          |
        |   correspondre pour être validée.                                 |
        |   Ex. if(emailUser === email || mdpUser === mdp) { ... }          |
        |                                                                   |
        |   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -   |
        |                                                                   |
        |   # L'Opérateur " ! " ou encore NOT.                              |
        |   Il signifie le CONTRAIRE DE, DIFFERENT DE                       |
        |                                                                   |
        |   var monUtilisateurEstApprouve = true;                           |
        |   if ( !monUtilisateurEstApprouve ) { ... }                       |
        |   Si mon utilisateur n'est pas approuvé                           |
        |                                                                   |
        |  Revient à écrire                                                 |
        |  if ( monUtilisateurEstApprouve === false ) { ... }               |
        |                                                                   |
        \*_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _*/

