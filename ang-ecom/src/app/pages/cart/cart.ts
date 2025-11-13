import { Component } from '@angular/core';
import { CartItem } from './cart-item/cart-item';
@Component({
  selector: 'app-cart',
  imports: [CartItem],
  template: `

     <div class="container">
      <div class="flex flex-col-2 justify-between  scap">
        <h2 class="text-3xl bold  bg-white w-5/6 p-3 ">Shopping Cart</h2>
        <h4 class="text-2xl bold font-extralight bg-white p-3  w-1/6 p">Price</h4>
      </div>
      <div >
        <app-cart-item/>
        <app-cart-item/>
  
      </div>
      <div class="total flex">
        <h4 class=" text-2xl   bg-white   text-right w-5/6  p-3 p">Subtotal</h4>
        <h4 class="text-xl  font-bold bg-white p-3  w-1/6 p mr-[100px]">$ 200</h4>
      </div>
    </div>
  `,

  styles: `
  .scap{
    margin-top: 50px;
    margin-left: 100px;
    margin-right: 100px;
    border-bottom: 1px solid #2A7B9B;
  }
  .sc{
    margin-left: 100px;
    border-bottom: 1px solid #2A7B9B;
    }
    
  .p{padding-left: 100px;}
  .total{margin-left: 100px;}

 
  `,

})
export class Cart {

}
