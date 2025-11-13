import { Component, input, output } from '@angular/core';

@Component({
  selector: 'app-primary-button',
  imports: [],
  template: `
    <button (click)="btnClick.emit()" class="bg-cyan-700 text-white px-4 py-2 rounded-lg shadow-lg  hover:bg-cyan-800">
        {{label()}}
    </button>
  `,
  styles: ``,
})
export class PrimaryButton {
  label= input('');

  btnClick=output();// an output  contains somthing that can be listened to by other components (in this case the header component) 
/*
  HandleBtnClick(){
    console.log("clicked child"); //  this is the function that is called when the button is clicked
    this.btnClick.emit();// emit the event to the header component
  } */

}
