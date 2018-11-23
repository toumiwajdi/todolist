import {Routes,RouterModule} from '@angular/router';
import {ModuleWithProviders} from '@angular/core';
import {UserLoginComponent} from "./user-login/user-login.component";
import {UserSignUpComponent} from "./user-sign-up/user-sign-up.component";
import {TodoAddComponent} from "./todo-add/todo-add.component";
import {TodoListComponent} from "./todo-list/todo-list.component";
import {TodoUpdateComponent} from "./todo-update/todo-update.component";


export const routes: Routes = [
	{
        path: '',
        component: RouterModule,
        children: [
        	// ours
		    {path: '', redirectTo: 'login'},
		    {path: 'login', component: UserLoginComponent},
		    {path: 'signup', component: UserSignUpComponent},
		    {path: 'todolist', component: TodoListComponent},
		    {path: 'todoadd', component: TodoAddComponent},
		    {path: 'todoupdate', component: TodoUpdateComponent},

        ]

    }
];


export const LayoutRoutes: ModuleWithProviders = RouterModule.forChild(routes);
