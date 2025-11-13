import { Injectable, signal } from '@angular/core';
import { Product } from '../models/products.moldels';

@Injectable({
  providedIn: 'root', // this is the service that is available to all components in the app
})
export class Cart {
  cart=signal<Product[]>([]);// this is the signal that is available to all components in the app

  addToCart(product: Product){
    this.cart.set( [...this.cart(), product] );// this is the function that is called when the button is clicked even though it is originally in the primary button component, adding oroduct to current array of products in the cart
    console.log(this.cart());
  }
}
