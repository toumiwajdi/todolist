import {HttpClient} from '@angular/common/http';

import { Injectable } from '@angular/core';
import * as global from "../model/global"
@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private http: HttpClient) {
  }


  getAllToDo(id:number) {
    return this.http.post(`${global.backend_url}/getMyToDo.php`,id);
  }
  getUserLogin(email : string){
    return this.http.post(`${global.backend_url}/userLoginApi.php`,email);
  }
  signUp(email : string){
    return this.http.post(`${global.backend_url}/userAddApi.php`,email);
  }
}
