import { Component } from '@angular/core';

@Component({
  selector: 'app-cart-item',
  imports: [],
  template: `
    

    <div class="  mx-[100px]  p-3 relative   shadow-mg bg-white brd">

      <div class="flex">
        <div class="col-1">
          <img src="https://www.shutterstock.com/image-photo/varna-bulgaria-february-02-2014-600nw-255862375.jpg" alt="product image" class="max-h-70 object-contain" >
        </div>

        <div class="col-2 pl-2"> 
          <div class="row-1 ">
            <span class="text-2xl mr-[250px] font-bold ">Product goes here. Is superlong. dont knwo. where to put the product name</span>
          </div>

          <div class="row-2 ">
            <span class=" text-sm  text-green-700 ">In Stock</span>
          </div>

          <div class="row-3 ">
            <span class="absolute top-3 right-3 text-2xl font-bold  ">$ 200</span>
          </div>

          <div class="row-3 ">
              <div class="col-3">
                <button class="dark:bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg  hover:bg-red-600" >Remove from Cart</button>
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

}
/*      */