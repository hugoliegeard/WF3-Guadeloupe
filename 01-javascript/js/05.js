/* -----------------------------------
    INCREMENTATION & DECREMENTATION
------------------------------------ */

// ## ~ INCREMENTATION ~ ## //

var nb1 = 1;
nb1 = nb1 + 1;
// Ecriture simplifié
// La même chose que nb1 = nb1 + 1; Toujours par pas de 1
nb1++; 

nb1 = 1;
nb1 = nb1 + 2;
// Ecriture simplifié
nb1 +=2; // J'ajoute +2 à nb1 identique a nb1 = nb1 + 2;
nb1 +=5; // J'ajoute +5 à nb1 identique a nb1 = nb1 + 5;

// ## ~ DECREMENTATION ~ ## //
nb1 = nb1 - 1;
// Ecriture simplifié
nb1--;

// ou encore
nb1 = nb1 - 2;
// Ecriture simplifié
nb1 -=2;
nb1 -=5;

// ## ~ SUBTILITE ~ ## //

nb1 = 0;
nb1++; // nb1 = nb1 + 1;
console.log( nb1 ); // 1

nb1 = 0;
console.log( nb1++ ); // 0, Ici Javascript affiche d'abord nb1 avant de faire l'incrementation.
console.log( nb1 ); // 1

nb1 = 0;
console.log( ++nb1 ); // 1, Ici javascript fait l'incrementation avant d'afficher nb1.