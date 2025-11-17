import { Injectable, signal } from '@angular/core';
import { CartProducts } from '../models/cartProducts.models';

@Injectable({
  providedIn: 'root', // available to all components
})
export class CartS {
  // Signal holding the array of products in the cart
  cart = signal<CartProducts[]>([]);

  // Add a product to the cart
  addToCart(product: CartProducts) {
    // Do NOT Append new product to current array, Update the quantity of the product in the cart ONLY
    let exist = this.cart().findIndex(p => p.id === product.id);// find the index of the product in the car
  
    if(this.checkAdd(product)){// check if the product is out of stock before atempting to add it to the cart
    
      if (exist === -1) {// if the product is not in the cart
        product.quantity = 1;
        this.cart.set([...this.cart(), product]);
        console.log('Cart after adding:', this.cart());
      }else if (exist !== -1) {  // if the product is in the cart
        this.cart()[exist].quantity ++;// update the quantity of the product in the cart without adding the product
        console.log( "\n ","\nORIGINAL: ",product);
        console.log('Cart after updating:', this.cart());
      }
    }
  }
// check if the product is out of stock
  checkAdd(prod: CartProducts): boolean{

      if(prod.stock === 0){
        alert(prod.title +" is out of stock");
        //this.cardCartService.cart().removeFromCart(prod);
      return false;
      }
      return true;
  }

  // Remove a specific product from the cart
  removeFromCart(product: CartProducts ) {
    if(product.quantity === 1){
      this.cart.set(this.cart().filter(p => p.id !== product.id)); // filter out the product. p => p.id !== product.id: array function, p -> each product in the array. It keeps the product ONLY if p.id !== product.id, ONLY if the id is not equal to the id of the product to be removed.
      console.log('Cart after removing:', this.cart());
    }else if(product.quantity > 1){
      this.cart()[this.cart().findIndex(p => p.id === product.id)].quantity --;// update the quantity of the product in the cart without adding the product
      console.log('Cart after updating:', this.cart());
    }
  }

  // Optional: clear entire cart
  clearAll() {
    this.cart.set([]);
    console.log('Cart cleared:', this.cart());
  }
}
