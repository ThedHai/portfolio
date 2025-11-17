import { Component, computed, Input, signal, OnInit, inject } from '@angular/core';
import { CartItem } from './cart-item/cart-item';
import { Header } from '../../components/header/header';  
import { CartProducts } from '../../models/cartProducts.models';
import { CartS } from '../../service/cart-s';
import { CartButton } from '../../components/cart-button/cart-button';

@Component({
  selector: 'app-cart',
  imports: [CartItem, CartButton],
  template: `
    

      @if (cartProd().length > 0) {
      <div class=" container mx-auto mt-10 grid grid-col-2 bg-white mb-20 ">
            <div class="flex  justify-between  col-1 c">
              <h2 class="text-3xl bold  bg-white  p-3 ">Shopping Cart</h2>
              <h4 class="text-2xl text-center text-shadow-green-250 font-extralight bg-white p-3   p">Price</h4>
            </div>

            <div class="overflow-hidden">
                    @for (prod of cartProd(); track prod.id) {
                        <app-cart-item [cProduct]="prod"
                                        (itemtbRemoved)="removeProd($event)"/>
                                      }
            </div>

            <div class="total flex">
              <h4 class=" text-2xl   bg-white   text-right w-5/6  p-3 p bor">Subtotal:</h4>
              <h4 class="text-2xl  text-left font-bold bg-white pl-10 pt-3   w-1/6  ">
                    $ {{subTotal}}
              </h4>
            </div>

            <div class= " ml-auto w-[200px] bg-white p-3">
              <button class=" top-3  flex text-2xl font-bold bg-amber-400 text-gray-500 justify-center border-r-2 border-amber-400 p-2 mt-10 mr-10 hover:bg-amber-500 rounded-lg shadow-md outline-3 outline-offset-2 outline-double">
                  <img src="https://images.vexels.com/media/users/3/157890/isolated/preview/4f2c005416b7f48b3d6d09c5c6763d87-check-mark-circle-icon.png" 
                  class="w-5 h-5" alt="check icon" />
                  Checkout
              </button> 
            </div> 
          </div>

        }
        @else {
          <div class="container mx-auto mt-10 grid grid-col-2 bg-white ">
              <div class="flex  justify-between  col-1 c">
                <h2 class="text-3xl bold  bg-white  p-3 ">Shopping Cart</h2>
                <h4 class="text-2xl text-center text-shadow-green-250 font-extralight bg-white p-3   p">Price</h4>
              </div>
              <h1 class="text-center text-3xl font-bold text-green-800 ">Your cart is empty</h1>

              <div class="total flex">
              <h4 class=" text-2xl   bg-white   text-right w-5/6  p-3 p bor">Subtotal:</h4>
              <h4 class="text-2xl  text-left font-bold bg-white pl-10 pt-3   w-1/6  ">
                    $ {{subTotal}}
              </h4>
            </div>
            </div>
      
        }
 

  `,

  styles: `
  .c{
      border-bottom: 1px solid #2A7B9B;
    }otal{margin-left: 100px;}

 
  `,

})
export class Cart implements OnInit {
  cartService = inject(CartS);

  cartProd = this.cartService.cart; 

  constructor() {
   
  }
  subTotal = 0;

  ngOnInit() {
    console.log('Product list:\n', this. cartProd); // log cart product

    // Calculate subtotal
    this.calcTotal();
  }

  removeProd(prodRemove: CartProducts){
    this.cartService.removeFromCart(prodRemove);
    this.calcTotal();
  }

calcTotal(){
  this.subTotal = this.cartProd().reduce(// .reduce() takes an array and “reduces” it to a single value. It takes two arguments: a function that takes two arguments (previousValue, currentValue) and an initial value (in this case, 0). It returns the final value.
    (total, item) => total + item.price * item.quantity,
    0
  );  
}

}
/*

                
                
                
                 <div class=" dark: bg-gray-500">
      <div class="grid grid-cols-3 gap-4"> 
        <div class="col-1 w-xs ml-30 bg-red-600">sdfl;asjdlf</div>
        <div class="col-2">asdfjasdfasdfasdfasdf</div>
        <div class="col-3">asdfjasdfasdfasdfasdf</div>
      </div>
    </div>*/