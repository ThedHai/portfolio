import { Component } from '@angular/core';
import{AccountCard} from './account-card/account-card';

@Component({
  selector: 'app-account',
  imports: [AccountCard],
  template: `
   <div class="container mx-auto  mt-10 grid  ">
      <div class="grid grid-cols-3 justify-between min-h-[500px] ">
        <app-account-card/>
        <app-account-card/> 
        <app-account-card/>
        <app-account-card/>
        <app-account-card/> 
        <app-account-card/>
      </div>
      <div class="grid grid-cols-3 justify-between  mt-40 ">
        additional cards

      

    </div>
  `,
  styles: ``,
})
export class Account {

} 
