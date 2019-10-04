import { Component } from '@angular/core';
import {Task} from '../models/task';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  constructor() {}

  /** Liste de tâches */
  tasks: Task[] = [
    {
      id: 1,
      title: 'Faire la vaisselle',
      status: false
    },
    {
      id: 2,
      title: 'Sortir le chien',
      status: true
    },
    {
      id: 3,
      title: 'Faire une promenade avec mon épouse',
      status: false
    }
  ];

}
