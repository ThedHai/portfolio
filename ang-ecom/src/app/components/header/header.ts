import { Component, inject, signal } from '@angular/core';
import { PrimaryButton } from "../primary-button/primary-button";
import { Cart } from '../../service/cart';
import { RouterLink } from "@angular/router";

@Component({
  selector: 'app-header',
  imports: [PrimaryButton, PrimaryButton, RouterLink],
  template: `
      <div class="bg-slate-100 px-4 py-3 shadow-lg flex justify-between items:center hd">
        <button class="text-2xl text-white" routerLink="/">{{title()}}</button>
        <app-primary-button [label]=" 'cart(' + cartService.cart().length +')'" routerLink="/cart" (btnClick)="showButtonClicked()" ></app-primary-button> <!-- this is the button that is in the primary button component using data binding of btn from primary button component, and showButtonClicked and title from header component -->
      </div>


  `,
  styles: `
  .hd{
    background: #2A7B9B;
background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);
 
    }
    `
})
export class Header {
  title=signal("ZapWire") ;

  cartService=inject(Cart)

  showButtonClicked(){
    console.log("clicked from header");// this is the function that is called when the button is clicked even though it is originally in the primary button component
  }
}

