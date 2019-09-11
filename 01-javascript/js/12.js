  
/* -------------------------------------------------------
                LES EVENEMENTS 🤯🤢😈🤕
    
    Les évènements vont me permettre de déclencher une
    fonction ; c'est à dire, une série d'instructions ;
    suite à une action de mon utilisateur.
    
    OBJECTIF : Être en mesure de capturer ces évènements
    afin d'executer une fonction.

    Les Evenements : MOUSE ( Souris )

        click       : au clic sur un élément ;
        dblclick    : au double clic ;
        mouseenter  : la souris passe au dessus d'un élément ;
        mouseleave  : la souris sors de l'élément ;
        mouseover   : au passage de la souris ;

    Les Evenements : KEYBOARD ( Clavier )

        keydown     : une touche du clavier est enfoncée ;
        keyup       : une touche du clavier a été relachée ;

    Les Evenements : WINDOW ( Fenêtre )

        scroll      : défilement de la fenêtre ;
        resize      : redimentionnement de la fenêtre ;

    Les Evenements : FORM ( Formulaire )

        change      : pour les éléments <input>, <select> et <textarea> ;
        submit      : à l'envoi (soumission) du formulaire ;
        input       : pour capter la saisie d'un utilisateur sur le champ <input>

    ################## LES ECOUTEURS D'EVENEMENTS ##################

    Pour attacher un évènement à un élément, ou autrement dit,
    pour déclarer un écouteur d'évènements qui se chargera de
    déclencher une fonction, je vais utiliser la syntaxe suivante :
*/
    
const p = document.getElementById('monParagraphe');

function changerLaCouleurEnRouge() {
    p.style.color = "red";
}

function changerLaCouleurEnNoir() {
    p.style.color = "black";
}

// p.addEventListener('mouseover', changerLaCouleurEnRouge);
p.addEventListener('click', changerLaCouleurEnRouge);
p.addEventListener('mouseleave', changerLaCouleurEnNoir);