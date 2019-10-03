import {Injectable} from '@angular/core';
import {Contact} from '../models/contact';

@Injectable({
  providedIn: 'root'
})
export class StorageService {

  constructor() {
  }

  /**
   * Permet de sauvegarder
   * nos contacts dans le storage.
   */
  saveContacts(contacts: Contact[]) {
    // localStorage.setItem("cle","valeur")
    localStorage.setItem('contacts', JSON.stringify(contacts));
  }

  /**
   * Permet de récupérer les
   * contacts du storage.
   */
  getContacts(): Contact[] {

    const contacts = JSON.parse(
      localStorage.getItem('contacts')
    );

    if ( contacts !== null) {
      return contacts;
    } else {
      return [];
    }

  }

}
