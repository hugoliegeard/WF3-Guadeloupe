// alert('Mon fichier JS fonctionne !');

// Deux slash pour faire un commentaire uniligne

/*
    Ici, je peux faire un commentaire
    sur plusieurs lignes.

    RACCOURCI :
        - CTRL + :
        - SHIFT + ALT + A

*/

// -- 1 : Déclarer une variable JS
var prenom;

// -- 2 : Affecter une valeur à la variable "prenom"
prenom = 'Hugo';

// -- 3 : Afficher la valeur de ma variable dans la console

// console.log( Prenom ); Uncaught ReferenceError: Prenom is not defined. Car javascript est sensible à la casse. Pas d'accent dans les noms de variables.

console.log( prenom );

/*------------------------------------------------
| ~ ~ ~ ~ ~ ~ LES TYPES DE VARIABLES ~ ~ ~ ~ ~ ~ |
------------------------------------------------*/

// -- typeof me permet de connaitre le type de la valeur de ma variable.
console.log( typeof prenom ); // Ma variable "prenom" contient une chaine de caractère (string).

// -- Déclaration et affectation d'un nombre
var age = 40;

// -- Connaitre son type
console.log( age );
console.log( typeof age );

// -- Les variables de type FLOAT
var uneDecimale = -2.984;
console.log( uneDecimale );
console.log( typeof uneDecimale );

// -- Les Booléens ( Vrai / Faux )
var unBooleen = false; // true
console.log( unBooleen );
console.log( typeof unBooleen );

// -- Les constantes

/**
 * La déclaration "const" me permet de créer
 * une constante accessible UNIQUEMENT en lecture.
 * Sa valeur ne pourra pas être modifiée par des
 * réaffectations ultérieures.
 */

const host = "localhost";
const user = "root";
const password = "mysql";

// Je ne peux pas faire cela
// user = "hugo";
// Uncaught TypeError: Assignment to constant variable.

var unNombre = '24';
console.log( unNombre );
console.log( typeof unNombre ); // Petite subtilité, "unNombre" est ici de type "string" à cause des quotes au moment de l'affectation.

// -- Pour convertir un nombre entier (Integer, ou Int)
unNombre = parseInt( unNombre );
console.log( unNombre );
console.log( typeof unNombre );

// -- Pour convertir un nombre à virgule (Float)
unNombre = '12.55';
unNombre = parseFloat( unNombre );
console.log( unNombre );
console.log( typeof unNombre );

// -- Pour convertir un nombre entier ou float en string
unNombre = 10;
var unString = unNombre.toString();
console.log( unString );
console.log( typeof unString );

/* -----------------------------------------------------------------\
|         ~   ~       LA PORTEE DES VARIABLES      ~   ~            |
|                                                                   |
|   Les variables déclarées directement à la racine du fichier JS   |
|   sont appelées : variables GLOBALES.                             |
|                                                                   |
|   Elles sont disponible dans l'ensemble de votre document, y com- |
|   -pris dans les fonctions.                                       |
|                                                                   |
|   ###                                                             |
|                                                                   |
|   Les variables déclarées à l'intérieur d'une fonction sont       |
|   appelées : variables LOCALES.                                   |
|                                                                   |
|   Elles sont disponible UNIQUEMENT dans le scope de la fonction   |
|                                                                   |
\------------------------------------------------------------------*/                                                                   