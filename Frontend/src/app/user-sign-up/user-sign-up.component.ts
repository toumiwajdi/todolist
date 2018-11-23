import { Component, OnInit } from '@angular/core';
import {UserService} from "../service/user.service";

@Component({
  selector: 'app-user-sign-up',
  templateUrl: './user-sign-up.component.html',
  styleUrls: ['./user-sign-up.component.css']
})
export class UserSignUpComponent implements OnInit {

  constructor(private user:UserService) { }
  email : string;
  response : string;
  ngOnInit() {
  }
  signup(){
    this.user.getUserLogin(this.email).subscribe(() => {
      },
      (err) => {
        this.response = 'An error has occured. Please try again later';

        if(err.hasOwnProperty("error")) {
          this.response = err.error;
          return;
        }
      });
  }

}
