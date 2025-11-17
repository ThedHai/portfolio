import { Component, signal } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Header } from './components/header/header';
import { ProductList } from './pages/product-list/product-list';
import { AccountButton } from './components/account-button/account-button';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, Header, ProductList, AccountButton],
  template: `

    <app-header/>
    <router-outlet></router-outlet>
 

  `,
  styles: [],
})
export class App {
  protected readonly title = signal('ang-ecom');
}
