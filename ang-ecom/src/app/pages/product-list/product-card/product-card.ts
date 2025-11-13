import { Component, input } from '@angular/core';
import { Product } from '../../../models/products.moldels';
import { PrimaryButton } from "../../../components/primary-button/primary-button";
import { Cart } from "../../../service/cart";
import { inject } from '@angular/core';


@Component({
  selector: 'app-product-card',
  imports: [PrimaryButton],
  template: `
    <div class="bg-white shadow-md border-white rounded-xl p-6 flex flex-col  relative " >
        <div class="mx-auto">
           <img [src]="product().image" alt="product image" class="w-[200px] h-[100px]  rounded-t-xl object-contain"/>
        </div>
        <div class="flex  flex-col justify-between p-3 r w-full items-center">
          <span class="flex text-lg font-bold justify-center">{{product().title}}</span>
          <span class="flex text-md text-gray-500 text-left  justify-center">{{ "$" + product().price }}</span>
          <app-primary-button label="Add to Cart" class="mt-3 " (btnClick)="cardCartService.addToCart(product())"></app-primary-button>
        </div>
        <div class="absolute top-3 right-3 text-sm font-bold ">
          @if (product().stock) {
            <span class="text-green-700">{{product().stock}} left</span>
          }@else {
            <span class="text-red-500"> Out of Stock</span>
          }
        </div>



    </div>  
  
  `,
  styles: ``,
})
export class ProductCard {
  cardCartService=inject(Cart);

  product = input.required<Product>(); // <> means it is a signal of type Product

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