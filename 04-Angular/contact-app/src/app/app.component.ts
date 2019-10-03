/**
 * Pour déclarer une classe comme composant
 * de notre application, on importe "component"
 * via @angular/core.
 */
import {Component, OnInit} from '@angular/core';
import {Contact} from './models/contact';
import {StorageService} from './services/storage.service';

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
export class AppComponent implements OnInit {

  constructor(private storageService: StorageService) {
  }

  // -- Déclaration d'une variable
  title = 'Gestion de Contacts';
  contactActif: Contact;

  // -- Déclaration d'un objet contact
  unContact: Contact = {
    id: 1,
    name: 'Hugo LIEGEARD',
    username: 'hugoliegeard',
    email: 'wf3@hl-media.fr',
  };

  // -- Tableau de Contacts
  mesContacts: Contact[] = [];

  /**
   * Permet d'afficher le profil
   * d'un contact.
   */
  displayProfil(contactCliqueParMonUtilisateur: Contact) {
    // console.log( contactCliqueParMonUtilisateur );

    this.contactActif = contactCliqueParMonUtilisateur;

  }

  /**
   * Le nouveau contact récupéré
   * depuis le composant New Comp
   */
  addContact(nouveauContact: Contact) {
    // -- Je pousse dans mon tableau le nouveau contact
    this.mesContacts.push(nouveauContact);

    // -- J'Enregistre dans le storage mes contacts
    this.storageService.saveContacts(
      this.mesContacts
    );
  }

  /**
   * Je récupère les contacts du storage,
   * je les insère dans mon tableau "mesContacts"
   * au moment ou l'application s'initialise. "ngOnInit"
   */
  ngOnInit(): void {
    this.mesContacts = this.storageService.getContacts();
  }

}
