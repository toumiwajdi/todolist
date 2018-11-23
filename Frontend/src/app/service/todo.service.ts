import {HttpClient} from '@angular/common/http';

import { Injectable } from '@angular/core';
import * as global from "../model/global"
import {Todo} from "../model/todo.model";

@Injectable({
  providedIn: 'root'
})




@Injectable()
export class TodoService {

  constructor(private http: HttpClient) {
  }

  addToDo(todo:Todo) {
    return this.http.post(`${global.backend_url}/addToDoApi.php`,todo);
  }
  updateToDo(todo:Todo){
    return this.http.post(`${global.backend_url}/updateToDoApi.php`,todo);
  }

}
