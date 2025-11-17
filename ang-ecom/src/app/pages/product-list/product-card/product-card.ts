import { Component, input } from '@angular/core';
import { Product } from '../../../models/products.moldels';
import { PrimaryButton } from "../../../components/primary-button/primary-button";
import { CartS } from "../../../service/cart-s";
import { inject } from '@angular/core';
import { CartProducts } from '../../../models/cartProducts.models';


@Component({
  selector: 'app-product-card',
  imports: [PrimaryButton],
  template: `
    <div class="bg-white shadow-md border-white rounded-xl p-6 flex flex-col min-h-[100px] h-svh max-h-[400px]  relative overflow-auto " >
        <div class="mx-auto">
           <img [src]="product().image" alt="product image" class="w-[200px] h-[100px]  rounded-t-xl object-contain"/>
        </div>

        <div class="flex  flex-col justify-between p-3 r w-full items-center">
          <span class="flex text-lg font-bold justify-center">{{product().title}}</span>
          <span class="flex text-md text-gray-500 text-left  justify-center">{{ "$" + product().code}}</span>
          <span class="flex text-lg text-gray-600 text-left  justify-center">{{ "$" + product().price }}</span>
          <app-primary-button label="Add to Cart" class="mt-3 " (btnClick)="cardCartService.addToCart(product())"></app-primary-button>
        </div>

        <div class="absolute top-3 right-3 text-sm font-bold ">
          @if (product().stock) {
            <span class= "flex text-green-700">
              <img src="https://images.vexels.com/media/users/3/157890/isolated/preview/4f2c005416b7f48b3d6d09c5c6763d87-check-mark-circle-icon.png" 
                class="w-5 h-5" alt="check icon" />
              {{product().stock}} 
              left</span>
          }@else {
            <span class=" flex text-red-500">  
              <pre>Out of Stock</pre>
              
            </span>
          }
        </div>



    </div>  
  
  `,
  styles: ``,
})
export class ProductCard {

  cardCartService=inject(CartS);
  product = input.required<CartProducts>(); // <> means it is a signal of type Product



}
/*  
       <div class="mx-auto"> <!-- Card image -->
            <img src="{{product().image}}" alt="product image" class="w-full"/>  
      </div>

        <div class="flex  flex-col justify-between items-center w-lg">
          <span class="text-2xl font-bold">{{product().title}}</span>
          <span class="text-md text-gray-500">{{ "$" + product().price }}</span>
          <app-primary-button label="Add to Cart"></app-primary-button>
        </div>
        */