import { Component, signal } from '@angular/core';
import { RouterOutlet, RouterLink } from '@angular/router';
import { DataBinding } from './pages/data-binding/data-binding';
import { Users } from './pages/users/users';



@Component({//decorator
  selector: 'app-root',
  imports: [RouterOutlet, DataBinding, Users, RouterLink],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  protected readonly title = signal('angular_project');
}
