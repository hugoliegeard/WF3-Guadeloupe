
import {Component, EventEmitter, OnInit, Output} from '@angular/core';
import {Contact} from '../models/contact';

@Component({
  selector: 'app-new',
  templateUrl: './new.component.html',
  styleUrls: ['./new.component.scss']
})
export class NewComponent implements OnInit {

  @Output() newContactEvent = new EventEmitter();
  nouveauContact: Contact = new Contact();

  constructor() { }

  ngOnInit() {
  }

  /**
   * Fonction appelée après
   * la soumission du formulaire.
   */
  submitContact() {
    // console.log( this.nouveauContact );

    /**
     * Lorsque mon formulaire est soumis,
     * j'emet un évènement qui sera écouté
     * par mon application et qui récupèrera
     * les données du nouveau contact.
     */

    this.newContactEvent.emit( this.nouveauContact );
    this.nouveauContact = new Contact();

  }
}
