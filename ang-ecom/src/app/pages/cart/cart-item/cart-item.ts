import { Component, computed, Input,input, signal, output, OnInit } from '@angular/core';
import { CartButton } from "../../../components/cart-button/cart-button";
import { CartS } from "../../../service/cart-s";
import { inject } from '@angular/core';
import { CartProducts } from '../../../models/cartProducts.models';

@Component({
  selector: 'app-cart-item',
  imports: [CartButton],
  template: `
    

    <div class="   p-3 relative   shadow-mg bg-white brd ">

      <div class="flex">
        <div class="col-1  max-w-60">
          <img src="{{cProduct().image}}" alt="product image" class="max-h-70  object-contain" >
        </div>

        <div class="col-2 pl-2"> 
          <div class="row-1 overflow-hidden h-[100px]  max-w-[350px]  mr-20">
            <span class="text-2xl ">{{cProduct().title}}</span>
          </div>
          <div class="col-2">
          <span class="flex items-center gap-2 text-gray-500 w-full">
            Code: {{ cProduct().code }}
          </span>
          </div>
          <div class="row-3 ">
            @if (cProduct().stock) {
              <span class=" flex text-green-700">
                <img src="https://images.vexels.com/media/users/3/157890/isolated/preview/4f2c005416b7f48b3d6d09c5c6763d87-check-mark-circle-icon.png" 
                class="w-5 h-5" alt="check icon" />
                 {{cProduct().stock}} left
              </span>
            }@else {
              <!-- remove from cart button -->
              <span class="text-red-500"> Out of Stock</span>
            }
              
          </div>

          <div class="row-4  ">
            <span class="absolute top-3 right-3 text-2xl font-bold  text-gray-500 py-2  ">$ {{  cProduct().price }}</span>
          </div>

          <div class="row-5 ">
             <span>Quantity: {{cProduct().quantity}}</span>
              <div class="col-3">
                
                <app-cart-button
                  label="Remove"
                  class="text-white py-2 rounded-lg shadow-lg"
                  (ibtnClick)="onRemove()">
                </app-cart-button>
              </div>
          </div>

        </div>  

      </div>

    </div>

 

  `,
  styles: `
  .brd{
  
    border-bottom: 1px solid #2A7B9B;

  }
  `,
})
export class CartItem {
  cProduct = input.required< CartProducts>();

itemtbRemoved=output<CartProducts>();

onRemove(){
  console.log('to be removed: ', this.cProduct());
  this.itemtbRemoved.emit(this.cProduct());

}
/*      */
}