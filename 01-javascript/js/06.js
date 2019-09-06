/* -----------------------------
        LES FONCTIONS 😍
----------------------------- */

/**
 * Déclarer une fonction 
 * --------------------------------------
 * Les instructions ne seront executées
 * que lorsque ma fonction sera appelée.
 * --------------------------------------
 */
function bonjour() {
    // -- instruction js --
    // -- instruction js --
    alert('Bonjour !');
    // -- instruction js --
    // -- instruction js --
}

/**
 * J'execute ma fonction, et je
 * déclenche ses instructions.
 */
// bonjour();

/**
 * Ici, notre fonction 'ditBonjour' définie 2 arguments.
 * Au moment de l'executer nous affecterons une valeur 
 * à chaque arguments. Ainsi, prenom sera égal à 'Hugo'
 * et nom sera égal à 'LIEGEARD'.
 */
function ditBonjour( prenom , nom ) {
    console.log(prenom + ' ' + nom);
    document.write(
        'Bonjour <strong>'
            + prenom
            + ' '
            + nom
            + '</strong> !<br>'
    );
}

ditBonjour( 'Hugo', 'LIEGEARD' );
ditBonjour( 'Nia', 'VITALIS' );

/* ---------------------------
    EXERCICE :
    Créez une fonction permettant d'effectuer
    l'addition de deux nombres (nb1 et nb2).
---------------------------------------------- */

function pomme( nb1, nb2 ) {
    // return : ce qui es retourné par la fonction lors de son execution.
    return nb1 + nb2;
}

var resultatDeMaFonction = pomme( 50, 5 );

console.log( 
    'Il y a ' 
        + resultatDeMaFonction 
        + ' pommes dans mon jardin !' 
);

//alert( resultatDeMaFonction );

/* ---------------------------
    EXERCICE :
    Créez une fonction permettant d'effectuer
    le calcul de la TVA d'un montant HT.
    Sachant que le taux de la TVA peut varier : 5.5, 8.5, 10, 20.
    Retourner le montant TTC.
---------------------------------------------- */

function calculTva( montantHt, tauxTva = 8.5 ) {
    return montantHt + ( montantHt * ( tauxTva / 100 ) );
    // return montantHt * tauxTva; ou tauxTva = 1.085 pour 8.5%...
}

var montantTtc1 = calculTva(10);
var montantTtc2 = calculTva(10, 5.5);
var montantTtc3 = calculTva(10, 20);

console.log( montantTtc1 );
console.log( montantTtc2 );
console.log( montantTtc3 );

/* ---------------------------
    EXERCICE :
    Créez une fonction permettant d'effectuer
    la conversion d'un montant de EURO et DOLLARS US
---------------------------------------------- */

function convertEurToUsd( montantEuro, tauxConversionUsd = 1.1035 ) {
    return montantEuro * tauxConversionUsd;
}

var montantEur = 20;
var montantUsd = convertEurToUsd( montantEur );
console.log( 
    montantEur
        + ' € en dollars donne : '
        + montantUsd
        + '$'
);