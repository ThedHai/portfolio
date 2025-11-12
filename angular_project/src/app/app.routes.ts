import { Routes } from '@angular/router';
import { Users } from './pages/users/users';
import { DataBinding } from './pages/data-binding/data-binding';

export const routes: Routes = [
    { // fault route/ empty path
        path: "",
        redirectTo: "Users", 
        pathMatch: "full"
    },
    {// route to users
        path: "users",
        component: Users
    },
    {//route to data-binding
        path: "data-binding",
        component: DataBinding
    }
    
];
