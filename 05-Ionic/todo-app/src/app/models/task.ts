export class Task {
    id: number = Date.now();
    title: string;
    status = false;
    duedate?: number;
}
