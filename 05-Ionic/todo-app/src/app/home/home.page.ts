import {Component} from '@angular/core';
import {Task} from '../models/task';
import {TaskStorageService} from '../services/task-storage.service';

@Component({
    selector: 'app-home',
    templateUrl: 'home.page.html',
    styleUrls: ['home.page.scss'],
})
export class HomePage {

    constructor(private taskStorage: TaskStorageService) {
        this.taskStorage.getTasks().then(tasks => {
            if (null !== tasks) {
                this.tasks = tasks;
            }
        });
    }

    /** Création d'une tâche */
    task: Task = new Task();

    /** Liste de tâches */
    tasks: Task[] = [];

    /**
     * Déclenche l'enregistrement
     * lors de la pression sur "Entrer"
     * @param code
     */
    saveTask(code: string): void {
        // -- Lorsque l'utilisateur appuie sur la touche "Entrer" ;
        if (code === 'Enter') {

            // -- Je pousse dans mon tableau la tâche ;
            this.tasks.push(this.task);

            // -- J'enregistre les tâches
            this.taskStorage.saveTasks(this.tasks);

            // -- Je remet à zero la tâche.
            this.task = new Task();
        }
    }
}
