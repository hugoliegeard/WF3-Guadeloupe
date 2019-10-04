import { Injectable } from '@angular/core';
import {Task} from '../models/task';
import {Storage} from '@ionic/storage';

@Injectable({
  providedIn: 'root'
})
export class TaskStorageService {

  constructor(private storage: Storage) { }

  /**
   * Permet de sauvegarder les tâches
   */
  saveTasks(tasks: Task[]): void {
    this.storage.set('tasks', tasks);
  }

  /**
   * Récupérer les tâches sauvegardées.
   */
  getTasks(): Promise<Task[]> {
    return this.storage.get('tasks');
  }

}
