import {Component, Input, OnInit} from '@angular/core';
import {Contact} from '../models/contact';

@Component({
  selector: 'app-profil',
  templateUrl: './profil.component.html',
  styleUrls: ['./profil.component.scss']
})
export class ProfilComponent implements OnInit {

  @Input() contactProfil: Contact;

  /**
   * Au moment ou Angular va charger notre
   * composant, nous pouvons lui demander
   * d'initialiser certaines valeurs.
   */

  /**
   * Le constructeur est la première
   * méthode à etre executé au chargement
   * de notre composant. Il va nous permettre
   * d'initialiser un certain nombre de données.
   */
  constructor() { }

  /**
   * Après le constructor, au moment du chargement
   * du composant, ngOnInit() est executé.
   */
  ngOnInit() {
  }

}
