import { Component,computed, inject, signal } from '@angular/core';
import { PrimaryButton } from "../primary-button/primary-button";
import { CartS } from '../../service/cart-s';
import { RouterLink } from "@angular/router";
import { AccountButton } from "../account-button/account-button"; 

@Component({
  selector: 'app-header',
  imports: [PrimaryButton, PrimaryButton, RouterLink, AccountButton],
  template: `
      <div class="sticky top-0 z-50 bg-slate-100 px-4 py-3 shadow-lg flex grid grid-cols-2 justify-between items:center hd max-w-full">
        <div class="col-1 ">
          <button class="text-2xl font-extrabold text-white" routerLink="/">{{title()}}</button>
        </div>
        <div class="col-2 flex place-content-end gap-4 ">
          <app-account-button [label]=" 'Your Account'" routerLink="account" (btnClick)="showButtonClicked()" ></app-account-button> <!-- this is the button that is in the primary button component using data binding of btn from primary button component, and showButtonClicked and title from header component -->
          <app-primary-button [label]=" 'Cart(' + cartQuantity() +')'" routerLink="/cart" (btnClick)="showButtonClicked()" ></app-primary-button> <!-- this is the button that is in the primary button component using data binding of btn from primary button component, and showButtonClicked and title from header component -->
        </div>
      </div>


  `,
  styles: `
  .hd{
    background: #2A7B9B;
background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 100%, rgba(237, 221, 83, 1) 100%);

 
    }
    `
})
export class Header {
  title=signal("ZapWire") ;

  cartService=inject(CartS)
cartQuantity(){
  return this.cartService.cart().reduce((total, itteratingElement) => // .reduce() takes an array and “reduces” it to a single value. It takes two arguments: a function that takes two arguments (accumulator, currentArrrayElement) and an initial value (in this case, 0). It returns the final value. in this case, it adds up the quantity of each product in the cart
                                          total + itteratingElement.quantity, //
                                            0);// initial value is 0, accumulator is the "total" quantity of the products in the cart
  }      
  showButtonClicked(){
    console.log("clicked from header: " );// this is the function that is called when the button is clicked even though it is originally in the primary button component
  }
}

