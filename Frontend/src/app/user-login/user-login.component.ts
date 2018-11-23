import { Component, OnInit } from '@angular/core';
import {UserService} from "../service/user.service";

@Component({
  selector: 'app-user-login',
  templateUrl: './user-login.component.html',
  styleUrls: ['./user-login.component.css']
})
export class UserLoginComponent implements OnInit {

  email : string;
  response : string;
  constructor(private user: UserService) { }

  ngOnInit() {
  }
  login() {
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
