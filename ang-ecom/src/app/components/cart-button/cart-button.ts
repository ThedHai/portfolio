import { Component, input, output } from '@angular/core';


@Component({
  selector: 'app-cart-button',
  imports: [],
  template: `
    <button (click)="btnClick.emit()" class="bg-cyan-700 text-white px-4 py-2 rounded-lg shadow-lg  hover:bg-cyan-800">
        {{label()}}
    </button>
  `,
  styles: ``,
})
export class CartButton {
  label= input('');//cart(0)

  btnClick=output();// an output  contains somthing that can be listened to by other components (in this case the header component) 

}
