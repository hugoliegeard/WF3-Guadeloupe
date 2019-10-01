/**
 * Pour déclarer une classe comme composant
 * de notre application, on importe "component"
 * via @angular/core.
 */
import {Component} from '@angular/core';
import {Contact} from './models/contact';

/**
 * @Component est ce qu'on appel un décorateur.
 * Il va nous permettre de définir 3 paramètres
 * essentiels à notre application...
 */
@Component({
  /**
   * Le sélecteur (selector) détermine le nom
   * de la balise HTML, permettant d'afficher
   * notre composant dans l'application.
   */
  selector: 'app-root',
  /**
   * "templateUrl" ou "template" est la partie
   * visible de notre composant. C'est ce qui
   * s'affiche à l'ecran lorsque le composant
   * est utilisé.
   */
  templateUrl: './app.component.html',
  /**
   * Déclarer les styles. NB: C'est un tableau.
   */
  styleUrls: ['./app.component.scss']
})
/**
 * La classe contient les données du
 * composant, mais aussi son comportement.
 * Dans notre contexte MVVM, notre classe
 * correspond au Model.
 */
export class AppComponent {

  // -- Déclaration d'une variable
  title = 'Gestion de Contacts';

  // -- Déclaration d'un objet contact
  unContact: Contact = {
    id: 1,
    name: 'Hugo LIEGEARD',
    username: 'hugoliegeard',
    email: 'wf3@hl-media.fr',
  };

  // -- Tableau de Contacts
  mesContacts: Contact[] = [
    {
      id: 1,
      name: 'Hugo LIEGEARD',
      username: 'hugoliegeard',
      email: 'wf3@hl-media.fr',
    },
    {
      id: 2,
      name: 'Nia VITALIS',
      username: 'niavitalis',
      email: 'nia971@gmail.com'
    },
    {
      id: 3,
      name: 'Astrid JONATHAN',
      username: 'astridjonathan',
      email: 'astrid.j@gmail.com'
    },
  ];

}
