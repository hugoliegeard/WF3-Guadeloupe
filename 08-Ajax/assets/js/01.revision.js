// -- Déclarer un tableau indexé
const Prenoms = ['Hugo', 'Astrid', 'Nia', 'Angélique'];

// -- Aperçu dans la console
console.log( Prenoms );

// -- Le nb d'éléments du tableau ?
const nbElementsDansMonTableau = Prenoms.length;
console.log( nbElementsDansMonTableau );

// -- Récupérer la valeur d'un élément du tableau. J'utilise son index.
console.log( Prenoms[1] ); // Astrid
console.log( Prenoms[3] ); // Angélique

let i = 2;
console.log( Prenoms[i] ); // Nia

// Boucle permettant d'afficher dans la console les prenoms
for( let i = 0 ; i < nbElementsDansMonTableau ; i++ ) {
    // -- Tous ce qui est situé à l'intérieur des accolades, sera dans la boucle.
    console.log( Prenoms[i] );
}

// -- Révision avec les objets
const Contact = {
    // INDICE   : VALEUR
    prenom      : 'Hugo',
    nom         : 'LIEGEARD',
    tel         : '0783971515'
};

// -- Aperçu dans la console
console.log( Contact );

// -- Pour récupérer les valeurs d'un objet, j'utilise le "." suivi de l'INDICE
console.log('Prénom : ' + Contact.prenom );
console.log('Nom : ' + Contact.nom );
console.log('Tel : ' + Contact['tel'] ); // Autre possibilité

const Contacts = [
    {
        // INDICE   : VALEUR
        prenom      : 'Hugo',
        nom         : 'LIEGEARD',
        tel         : '0783971515'
    },
    {
        // INDICE   : VALEUR
        prenom      : 'Nia',
        nom         : 'VITALIS',
        tel         : '0690122007'
    },
    {
        // INDICE   : VALEUR
        prenom      : 'Catherine',
        nom         : 'RADIPALY',
        tel         : '0690232255'
    }
];

console.clear(); // Vider la console
console.log( Contacts );

// -- 1. Pour récupérer mon objet
console.log( Contacts[1] );

// -- 2. Accéder aux valeurs de cet objet
console.log( Contacts[1].prenom );
console.log( Contacts[1].nom );
console.log( Contacts[1].tel );

// -- En résumé, j'accède à la valeur de l'indice "prenom" de l'objet situé à l'index 1 de mon tableau indexé "Contacts".

const Apprenants = [
    { prenom: "Hugo", nom: "LIEGEARD", orientation: "Fullstack" },
    { prenom: "Nia", nom: "VITALIS", orientation: "Front" },
    { prenom: "Catherine", nom: "RADIPALY", orientation: "Back" },
    { prenom: "Aurélie", nom: "NABAJOTH", orientation: "Front" },
    { prenom: "Gaëlle", nom: "CHARLES BELAMOUR", orientation: "Fullstack" },
    { prenom: "Laureen", nom: "LABUTHIE", orientation: "Front" },
];

/* ------------------------------------------------------
|       ~ ~ ~ ~    💀  EXERCICE 😜     ~ ~ ~ ~          |
|                                                        |  
|                                                        |  
|  Affichez dans la page HTML à l'aide de jQuery la      | 
|  liste (ul>li) des Etudiants et leur compétence.       | 
|                                                        | 
|_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  */

$(function() {

    // Ici, jQuery est prêt à travailler !
    console.log( 'jQuery is ready to rock !' );

    // Création d'une balise <ul></ul>
    const ul = $('<ul>');

    for( let i = 0 ; i < Apprenants.length ; i++ ) {

        // -- Je récupère l'étudiant en cours dans ma boucle.
        let Apprenant = Apprenants[i];

        // Aperçu dans la console.
        console.log( Apprenant );

        $('<li><strong>' + Apprenant.prenom + ' ' + Apprenant.nom + '</strong> : ' + Apprenant.orientation + '</li>').appendTo( ul );

        // $(`
        //     <li>
        //         <strong> ${Apprenant.prenom} ${Apprenant.nom} </strong>
        //         : ${Apprenant.orientation}
        //     </li>
        // `).appendTo( ul );

    } // Fin boucle For

    ul.appendTo('body');

}); 