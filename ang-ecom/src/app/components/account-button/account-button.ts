import { Component } from '@angular/core';
import { input, output } from '@angular/core';

@Component({
  selector: 'app-account-button',
  imports: [],
  template: `
    <button (click)="btnClick.emit()" class="text-lg text-white px-4 py-2   hover:text-gray-300">
        {{label()}}
    </button>     
  `,
  styles: ``,
})
export class AccountButton {
  label= input('');//cart this is the label that is displayed on the button

  btnClick=output();// an output  contains somthing that can be listened to by other components (in this case the header component)

}
