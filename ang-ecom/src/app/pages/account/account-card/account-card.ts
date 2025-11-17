import { Component } from '@angular/core';

@Component({
  selector: 'app-account-card',
  imports: [],
  template: `
    <div class=" p-3 flex flex-col h-30 border rounded-lg border-gray-400 w-sm shadow-mg my-4 bg-white ">
      <div class="grid grid-cols-2 justify-between items-center">
        <div class="col-1 flex">
          <img src="https://images.vexels.com/media/users/3/157890/isolated/preview/4f2c005416b7f48b3d6d09c5c6763d87-check-mark-circle-icon.png" 
          class="w-5 h-5" alt="check icon" />
          Account lorem</div>

      </div>

    </div>
  `,
  styles: ``,
})
export class AccountCard {

}
